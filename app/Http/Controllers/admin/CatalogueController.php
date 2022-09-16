<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalogue;

class CatalogueController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Catalogue";
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
        $data = Catalogue::all();
        $blade = "List Catalogue";
        return view('admin.catalogue.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $catalogue = new Catalogue();
            //$fileName = now()->timestamp.'.pdf';
             
            $name = $this->request->file('pdf')->getClientOriginalName();
            $fileName =  md5(uniqid().$name).'.'. $this->request->file('pdf')->getClientOriginalExtension();
            $catalogue->title = $this->request->title;
            $catalogue->pdf = $fileName;
            $catalogue->meta_title = $this->request->meta_title;
            $catalogue->meta_description = $this->request->meta_description;
            $catalogue->canonical = $this->request->canonical;
            $catalogue->analytics = $this->request->analytics;
            $catalogue->save();
            $this->request->pdf->move(public_path('catalogue/'), $fileName);
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
        $status = Catalogue::where(['id'=>$this->id]);
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
        $blade = "Add New Catalogue";
        return view('admin.catalogue.create', compact(['blade','fieldName']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Update Catalogue";
        $data = Catalogue::where(['id'=>$this->id])->first();
        return view('admin.catalogue.edit', compact(['data','blade','fieldName']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request->title)){
            if($this->request->pdf != 'undefined'){
                 $name = $this->request->file('pdf')->getClientOriginalName();
                $fileName =  md5(uniqid().$name).'.'. $this->request->file('pdf')->getClientOriginalExtension();
               // $fileName = now()->timestamp;
                $this->request->pdf->move(public_path('catalogue/'), $fileName);
                Catalogue::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
                    'meta_title' => $this->request->meta_title,
                    'meta_description' => $this->request->meta_description,
                    'canonical' => $this->request->canonical,
                    'analytics' => $this->request->analytics,
                    'pdf' => $fileName
                ]); 
            }else{
                Catalogue::where('id',$this->request->compId)->update([
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
        Catalogue::where('id', $this->id)->delete();
        return redirect()->back();
    }
}
