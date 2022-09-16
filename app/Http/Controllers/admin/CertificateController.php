<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Certificates;

class CertificateController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Certificates";
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
        $data = Certificates::all();
        $blade = "Certificates Images List";
        return view('admin.certificate.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $Certificates = new Certificates();
            $imgName = now()->timestamp;
            $Certificates->title = $this->request->title;
            $Certificates->image = $imgName;
            $Certificates->save();
            $this->request->image->move(public_path('images/certificate/'), $imgName);
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
        $status = Certificates::where(['id'=>$this->id]);
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
        $blade = "Add New Certificates";
        return view('admin.certificate.create', compact(['blade','fieldName']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Update Certificates";
        $data = Certificates::where(['id'=>$this->id])->first();
        return view('admin.certificate.edit', compact(['data','blade','fieldName']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request->title)){
            if($this->request->image != 'undefined'){
                $imgName = now()->timestamp;
                $this->request->image->move(public_path('images/certificate/'), $imgName);
                Certificates::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
                    'image' => $imgName
                ]); 
            }else{
                Certificates::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
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
        Certificates::where('id', $this->id)->delete();
        return redirect()->back();
    }
}
