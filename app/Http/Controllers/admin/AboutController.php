<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "About";
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
        $blade = "About";
        $data = About::first();
        return view('admin.about.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $About = new About();
            $About->title = $this->request->title;
            $About->slug = $this->request->slug;
            $About->description = $this->request->description;
            $About->brief_description = $this->request->brief_description;
            $About->meta_title = $this->request->meta_title;
            $About->meta_description = $this->request->meta_description;
            $About->canonical = $this->request->canonical;
            $About->analytics = $this->request->analytics;
            if($this->request->image != 'undefined'){
                $imgName = now()->timestamp;
                $this->request->image->move(public_path('images/'), $imgName);
                $About->analytics = $imgName;
            }
            $About->save();
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
            About::where('id',$this->request->compId)->update([
                'title' => $this->request->title,
                'slug' => $this->request->slug,
                'description' => $this->request->description,
                'brief_description' => $this->request->brief_description,
                'meta_title' => $this->request->meta_title,
                'meta_description' => $this->request->meta_description,
                'canonical' => $this->request->canonical,
                'analytics' => $this->request->analytics,
            ]);
            if($this->request->image != 'undefined'){
                $imgName = now()->timestamp;
                $this->request->image->move(public_path('images/'), $imgName);
                About::where('id',$this->request->compId)->update([
                    'image' => $imgName,
                ]);
            }        
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
