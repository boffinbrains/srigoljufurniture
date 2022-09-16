<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;

class BannerController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Banner";
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
        $data = Banner::all();
        $blade = "List Banners";
        return view('admin.banners.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $banner = new Banner();
            $imgName = now()->timestamp;
            $banner->title = $this->request->title;
            $banner->category = $this->request->category;
            $banner->image = $imgName;
            $banner->save();
            $this->request->image->move(public_path('images/banners/'), $imgName);
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
        $status = Banner::where(['id'=>$this->id]);
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
        $blade = "Add New Banner";
        $categories = Category::where('status',true)->get();
        return view('admin.banners.create', compact(['blade','fieldName','categories']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Update Banner";
        $data = Banner::where(['id'=>$this->id])->first();
        $categories = Category::where('status',true)->get();
        return view('admin.banners.edit', compact(['data','blade','fieldName','categories']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request->title)){
            if($this->request->image != 'undefined'){
                $imgName = now()->timestamp;
                $this->request->image->move(public_path('images/banners/'), $imgName);
                Banner::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
                    'category' => $this->request->category,
                    'image' => $imgName
                ]); 
            }else{
                Banner::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
                    'category' => $this->request->category,
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
        Banner::where('id', $this->id)->delete();
        return redirect()->back();
    }
}