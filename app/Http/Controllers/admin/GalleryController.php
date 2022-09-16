<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Images;

class GalleryController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Gallery";
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
        $data = Gallery::whereNull('product_id')->get();
        $blade = "Gallery Images List";
        return view('admin.gallery.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $gallery = new Gallery();
            $imgName = now()->timestamp;
            $gallery->title = $this->request->title;
            $gallery->image = $imgName;
            $gallery->meta_title = $this->request->meta_title;
            $gallery->meta_description = $this->request->meta_description;
            $gallery->canonical = $this->request->canonical;
            $gallery->analytics = $this->request->analytics;
            $gallery->save();
            $this->request->image->move(public_path('images/gallery/'), $imgName);
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
        $status = Gallery::where(['id'=>$this->id]);
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
        $blade = "Add New Gallery";
        return view('admin.gallery.create', compact(['blade','fieldName']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Add Images";
        $data = Gallery::where(['id'=>$this->id])->first();
        return view('admin.gallery.edit', compact(['data','blade','fieldName']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request->title)){
            if($this->request->image != 'undefined'){
                $imgName = now()->timestamp;
                $this->request->image->move(public_path('images/gallery/'), $imgName);
                Gallery::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
                    'image' => $imgName,
                    'meta_title' => $this->request->meta_title,
                    'meta_description' => $this->request->meta_description,
                    'canonical' => $this->request->canonical,
                    'analytics' => $this->request->analytics,
                ]); 
            }else{
                Gallery::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
                    'meta_title' => $this->request->meta_title,
                    'meta_description' => $this->request->meta_description,
                    'canonical' => $this->request->canonical,
                    'analytics' => $this->request->analytics,
                ]);
            }         
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
        Gallery::where('id', $this->id)->delete();
        Images::where('gallery_id', $this->id)->delete();
        return redirect()->back();
    }

    public function view()
    {
        $data = Images::where('gallery_id',$this->id)->get();
        $fieldName = $this->Field;
        $blade = "Add Image";
        $id = $this->id;
        $path = Gallery::where('id', $this->id)->orWhere('product_id',$this->id)->first();
        return view('admin.gallery.view', compact('blade','fieldName','data','id','path'));
    }

    public function galleryCreate()
    {
        $data = Gallery::where('id',$this->id)->orWhere('product_id',$this->id)->first();
        if(isset($this->request)){
            $Images = new Images();
            $imgName = now()->timestamp;
            $Images->title = $this->request->title;
            $Images->gallery_id = $this->id;
            $Images->path = $imgName;
            $Images->save();
            $this->request->image->move(public_path('images/gallery/'), $imgName);
            return response()->json([
                'message'=>'Data Inserted Successfully!',
                'response'=>true
            ],200);
        }else{
            return response()->json([
                'message'=>'Something Went Wrong!',
            ],403);
        }
    }
    
    public function galleryDelete()
    {
        Images::where('id', $this->id)->delete();
        return redirect()->back();
    }
}
