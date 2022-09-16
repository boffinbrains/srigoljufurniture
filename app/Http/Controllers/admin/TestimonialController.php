<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonials;

class TestimonialController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Testimonials";
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
        $data = Testimonials::all();
        $blade = "Testimonials List";
        return view('admin.testimonial.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $Testimonials = new Testimonials();
            $Testimonials->name = $this->request->name;
            $Testimonials->video = $this->request->video;
            $Testimonials->review = $this->request->review;
            if($this->request->image!='' && $this->request->image !='undefined'){
                $imgName = now()->timestamp;
                $Testimonials->image = $imgName;
                $this->request->image->move(public_path('images/testimonial/'), $imgName);
            }
            $Testimonials->save();
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
        $status = Testimonials::where(['id'=>$this->id]);
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
        $blade = "Add New Testimonial";
        return view('admin.testimonial.create', compact(['blade','fieldName']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Update Testimonials";
        $data = Testimonials::where(['id'=>$this->id])->first();
        return view('admin.testimonial.edit', compact(['data','blade','fieldName']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request)){
            Testimonials::where('id',$this->request->compId)->update([
                'name' => $this->request->name,
                'video' => $this->request->video,
                'review' => $this->request->review,
            ]);
            if($this->request->image != 'undefined'){
                $imgName = now()->timestamp;
                $this->request->image->move(public_path('images/testimonial/'), $imgName);
                Testimonials::where('id',$this->request->compId)->update([
                    'image' => $imgName
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
        Testimonials::where('id', $this->id)->delete();
        return redirect()->back();
    }
}
