<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Home;

class HomeController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Home";
    }

    public function operate(Request $request,$func='list',$id =null){
        $this->authorize('isAdmin');
        $this->id       = $id;
        $this->request  = $request;
        return $this->{$func}();
    }

    public function index()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Home";
        $data = Home::first();
        return view('admin.home.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $Home = new Home();
            $Home->title = $this->request->title;
            $Home->slug = $this->request->slug;
            $Home->meta_title = $this->request->meta_title;
            $Home->meta_description = $this->request->meta_description;
            $Home->canonical = $this->request->canonical;
            $Home->analytics = $this->request->analytics;
            $Home->save();
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

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request)){
            Home::where('id',$this->request->compId)->update([
                'title' => $this->request->title,
                'slug' => $this->request->slug,
                'meta_title' => $this->request->meta_title,
                'meta_description' => $this->request->meta_description,
                'canonical' => $this->request->canonical,
                'analytics' => $this->request->analytics,
            ]);       
            return response()->json([
                'message'=>'Data Updated Successfully!',
                'response'=>true
            ],200);
        }else{
            return response()->json([
                'message'=>'Something Went Wrong!',
            ],403);
        }
    }
}
