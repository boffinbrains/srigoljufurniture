<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Brands;
use App\Models\Gallery;
use App\Models\Images;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Product";
    }

    public function operate(Request $request,$func='list',$id =null){
        $this->authorize('isAdmin');
        $this->id       = $id;
        $this->request  = $request;
        return $this->{$func}();
    }

    public function list()
    {
        $fieldName = $this->Field;
        $data = Product::join('brands', 'brands.id', '=', 'products.brand') 
              		->get(['products.*', 'brands.title as btitle'])->sortBy('products.id',SORT_REGULAR, false);
        $blade = "Product List";
        return view('admin.product.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $product = new Product();
            // if($this->request->thumbnail != 'undefined'){
            //     $fileName = now()->timestamp;
            //     $this->request->thumbnail->move(public_path('images/product/thumbnail'), $fileName);
            //     $product->thumbnail = $fileName;
            // } 
            $fileName2 = now()->timestamp;
            $product->title = $this->request->title;
            $product->color = $this->request->color;
            $product->discount = $this->request->discount;
            $product->slug = Str::slug($this->request->slug, '-');
            $product->category_id = $this->request->category;
            $product->brand = $this->request->brand;
            $product->brief_description = $this->request->brief_description;
            $product->product_specification = $this->request->product_specification;
            $product->care_instructions = $this->request->care_instructions;
            $product->featured = $this->request->featured;
            $product->presentation = $this->request->presentation;
            $product->image = $fileName2;
            $product->meta_title = $this->request->meta_title;
            $product->meta_description = $this->request->meta_description;
            $product->canonical = $this->request->canonical;
            $product->analytics = $this->request->analytics;
            $product->save();
            $this->request->image->move(public_path('images/product/'), $fileName2);
            return response()->json([
                'message'=>'Data Inserted Successfully!',
            ],200);
        }else{
            return response()->json([
                'message'=>'Something Went Wrong!',
            ],403);
        }
    }

    public function status()
    {
        $this->authorize('isAdmin');
        $status = Product::where(['id'=>$this->id]);
        if($status->first()->status){
            $status->update(['status'=>false]);
        }else{
            $status->update(['status'=>true]);
        }
        return redirect()->back();
    }

    public function add()
    {
        $fieldName = $this->Field;
        $blade = "Add New Product";
        $categories = Category::all();
        $brands = Brands::all();
        
        return view('admin.product.create', compact(['blade','fieldName','categories','brands']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $categories = Category::all();
        $brands = Brands::all();
        $blade = "Update Product";
        $data = Product::where(['id'=>$this->id])->first();
        return view('admin.product.edit', compact(['data','blade','fieldName','categories','brands']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request->title)){
            Product::where('id',$this->request->compId)->update([
                'title' => $this->request->title,
                'color' => $this->request->color,
                'discount' => $this->request->discount,
                'slug' => $this->request->slug,
                'category_id' => $this->request->category,
                'brand' => $this->request->brand,
                'brief_description' => $this->request->brief_description,
                'product_specification' => $this->request->product_specification,
                'care_instructions' => $this->request->care_instructions,
                'featured' => $this->request->featured,
                'presentation' => $this->request->presentation,
                'meta_title' => $this->request->meta_title,
                'meta_description' => $this->request->meta_description,
                'canonical' => $this->request->canonical,
                'analytics' => $this->request->analytics,
            ]); 
            if($this->request->image != 'undefined'){
                $fileName2 = now()->timestamp;;
                $this->request->image->move(public_path('images/product/'), $fileName2);
                Product::where('id',$this->request->compId)->update([
                    'image' => $fileName2,
                ]);
            }
            // if($this->request->thumbnail != 'undefined'){
            //     $fileName = now()->timestamp;;
            //     $this->request->thumbnail->move(public_path('images/product/thumbnail'), $fileName);
            //     Product::where('id',$this->request->compId)->update([
            //         'thumbnail' => $fileName,
            //     ]);
            // }        
            return response()->json([
                'message'=>'Data Updated Successfully!',
                'response'=>true
            ],200);
        }else{
            return response()->json([
                'message'=>'Something Went Wrong!',
                'response'=>false
            ],403);
        }
    }

    public function delete()
    {
        $this->authorize('isAdmin');
        Product::where('id', $this->id)->delete();
        return redirect()->back();
    }

    public function gallery()
    {
        $checkGalleryExist = Gallery::where('product_id', $this->id)->first();
        if($checkGalleryExist) {
            $data = Images::where('gallery_id',$this->id)->get();
            $fieldName = $this->Field;
            $blade = "Add Images";
            $id = $this->id;
            $path = Gallery::where('product_id', $this->id)->first();
            return view('admin.gallery.view', compact('blade','fieldName','data','id','path'));
        }else{
            $gallery = new Gallery();
            $gallery->title = now()->timestamp;
            $gallery->product_id = $this->id;
            $gallery->save();

            $gallery_id = Gallery::latest()->first();
            $data = Images::where('gallery_id',$gallery_id)->get();
            $fieldName = $this->Field;
            $blade = "Add Images";
            $id = $this->id;
            $path = Gallery::where('id', $gallery_id)->first();
            return view('admin.gallery.view', compact('blade','fieldName','data','id','path'));
        }
    }
}
