<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;

class BrandController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Brands";
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
        $data = Brands::all();
        $blade = "Brands List";
        return view('admin.brand.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $Brands = new Brands();
            $imgName = now()->timestamp;
            $Brands->title = $this->request->title;
            $Brands->slug = $this->request->slug;
            $Brands->image = $imgName;
            $Brands->save();
            $this->request->image->move(public_path('images/brand/'), $imgName);
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
        $status = Brands::where(['id'=>$this->id]);
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
        $blade = "Add New Brand";
        return view('admin.brand.create', compact(['blade','fieldName']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Update Brand";
        $data = Brands::where(['id'=>$this->id])->first();
        return view('admin.brand.edit', compact(['data','blade','fieldName']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request->title)){
            if($this->request->image != 'undefined'){
                $imgName = now()->timestamp;
                $this->request->image->move(public_path('images/brand/'), $imgName);
                Brands::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
                    'slug' => $this->request->slug,
                    'image' => $imgName
                ]); 
            }else{
                Brands::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
                    'slug' => $this->request->slug,
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
        Brands::where('id', $this->id)->delete();
        return redirect()->back();
    }
}
