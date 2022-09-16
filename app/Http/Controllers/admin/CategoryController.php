<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Category";
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
        $data = Category::all();
        $blade = "Category List";
        return view('admin.category.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $category = new Category();
            $imgName = now()->timestamp;
            $category->title = $this->request->title;
            $category->slug = $this->request->slug;
            $category->meta_title = $this->request->meta_title;
            $category->meta_description = $this->request->meta_description;
            $category->canonical = $this->request->canonical;
            $category->analytics = $this->request->analytics;
            $category->thumbnail = $imgName;
            $category->save();
            $this->request->image->move(public_path('images/category/'), $imgName);
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
        $status = Category::where(['id'=>$this->id]);
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
        $blade = "Add New Category";
        return view('admin.category.create', compact(['blade','fieldName']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Update Category";
        $data = Category::where(['id'=>$this->id])->first();
        return view('admin.category.edit', compact(['data','blade','fieldName']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request->title)){
            if($this->request->image != 'undefined'){
                $imgName = now()->timestamp;
                $this->request->image->move(public_path('images/category/'), $imgName);
                Category::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
                    'slug' => $this->request->slug,
                    'meta_title' => $this->request->meta_title,
                    'meta_description' => $this->request->meta_description,
                    'canonical' => $this->request->canonical,
                    'analytics' => $this->request->analytics,
                    'thumbnail' => $imgName
                ]); 
            }else{
                Category::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
                    'slug' => $this->request->slug,
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
        Category::where('id', $this->id)->delete();
        return redirect()->back();
    }
}
