<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brands;
use App\Models\Gallery;
use App\Models\Images;
use App\Models\Presentation;
use Share;

class ProductController extends Controller
{
    public function index(Request $request, $slug)
    {
        $data = [];
        $breadcrumbTitle = 'Product';
        $data = Product::where('status', 1)->paginate(26);
        $metaData = Category::whereNotNull('meta_title')->first();
        $categories = Category::where(['status' => 1])->get();

        $category = Category::where('slug', $slug)->first();
        $brand = Brands::where('slug', $slug)->first();
        $product = Product::where('slug', $slug)->first();

        if (isset($category) && $category->count() > 0) {
            $breadcrumbTitle = $category->title;
            if (isset($request->type) && $request->type === 'discount') {
                $data = Product::where(['category_id' => $category->id, 'status' => 1])
                    ->whereNotNull('discount')
                    ->paginate(26);
            } else {
                $data = Product::where(['category_id' => $category->id, 'status' => 1])->paginate(26);
            }
        } elseif (isset($brand) && $brand->count() > 0) {
            $breadcrumbTitle = $brand->title;
            if (isset($request->type) && $request->type === 'discount') {
                $data = Product::where(['brand' => $brand->id, 'status' => 1])
                    ->whereNotNull('discount')
                    ->paginate(26);
            } else {
                $data = Product::where(['brand' => $brand->id, 'status' => 1])->paginate(26);
            }
        } elseif (isset($product) && $product->count() > 0) {
            return $this->productDetail($slug);
        } elseif ($slug === 'mall-rack') {
            return view('home.mall-rack', compact('categories', 'metaData'));
        } elseif ($slug === 'modular-kitchen') {
            return view('home.modular-kitchen', compact('categories', 'metaData'));
        }

        return view('home.products', compact('categories', 'metaData', 'data', 'breadcrumbTitle'));
    }

    public function productDetail($slug){
        $metaData = Product::where('slug',$slug)->first();
        // Social Sharer
        $shareButtons = \Share::page(
            'https://srigoljufurniture.com/',
            'Test Text',
        )->facebook();
        // Social Sharer
        $title = 'Product Details';
        $product = Product::where('slug',$slug)->first();
        $images = Images::getProductGallery($product->id);
        $categories = Category::where('status',true)->get();
        $category = Category::where(['status'=>true,'id'=>$product->category_id])->first();
        return view('home.product-details', compact(['title','metaData','images','categories','category','product','shareButtons']));
    }

    // public function productDetail($brand, $category, $slug)
    // {
    //     $title = 'Product Details';
    //     $product = Product::where(['slug' => $slug])->first();
    //     if(!$product) {
    //         abort(404);
    //     }
    //     $metaData = $product;
    //     $shareButtons = Share::page(env('APP_URL'))->facebook();
    //     $images = Images::getProductGallery($product->id);
    //     $category = Category::where(['status'=>true, 'id'=>$product->category_id])->first();
    //     $categories = Category::where('status', true)->get();
    //     return view('home.product-details', compact(['title', 'metaData', 'images', 'category', 'categories', 'product', 'shareButtons']));
    // }

    public function presentation()
    {
        $data = Presentation::where(['presentations.status' => 1])
            ->join('brands', 'presentations.brand_id', '=', 'brands.id')
            ->select('presentations.*', 'brands.image as brandImage')
            ->get();
        return view('home.presentation', compact('data'));
    }

    public function presentationList(Request $request, $slug)
    {
        $data = [];
        if ($slug === 'search') {
            return $this->presentationSearch($request);
        }
        $data = Product::where('presentation', 1)->paginate(26);
        $categories = Category::where(['status' => 1])->get();

        $category = Category::where('slug', $slug)->first();
        $brand = Brands::where('slug', $slug)->first();
        $product = Product::where('slug', $slug)->first();

        if (isset($category) && $category->count() > 0) {
            $data = Product::where('category_id', $category->id)
                ->where('presentation', 1)
                ->paginate(26);
        } elseif (isset($brand) && $brand->count() > 0) {
            $data = Product::where('brand', $brand->id)
                ->where('presentation', 1)
                ->paginate(26);
        } elseif (isset($product) && $product->count() > 0) {
            return $this->presentationDetail($slug);
        }
        $brands = Brands::orderBy('title', 'ASC')->get();
        return view('home.presentation-list', compact('categories', 'data', 'brands'));
    }

    public function presentationDetail($slug)
    {
        $title = 'Product Details';
        $product = Product::where('slug', $slug)->first();
        $images = Images::getProductGallery($product->id);
        $categories = Category::where('status', true)->get();
        $category = Category::where(['status' => true, 'id' => $product->category_id])->first();
        return view('home.presentation-detail', compact(['title', 'images', 'categories', 'category', 'product']));
    }

    public function presentationSearch($request)
    {
        $query = Product::where('presentation', 1);
        if ($slug = request()->query('brands')) {
            $brands = Brands::where('slug', $slug)->get();
            if (count($brands) > 0) {
                $query->where('brand', $brands[0]->id);
            }
        }
        if ($keyword = request()->query('query')) {
            $query->where('title', 'LIKE', "%$keyword%");
        }
        $data = $query->get();
        $categories = Category::where(['status' => 1])->get();
        $brands = Brands::all();
        return view('home.presentation-list', compact('data', 'categories', 'brands'));
    }
}
