<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stores;

class StoreController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Stores";
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
        $data = Stores::all();
        $blade = "Stores List";
        return view('admin.store.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $Stores = new Stores();
            $imgName = now()->timestamp;
            $Stores->title = $this->request->title;
            $Stores->email = $this->request->email;
            $Stores->mobile_number = $this->request->mobile_number;
            $Stores->description = $this->request->description;
            $Stores->image = $imgName;
            $Stores->save();
            $this->request->image->move(public_path('images/store/'), $imgName);
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
        $status = Stores::where(['id'=>$this->id]);
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
        $blade = "Add New Store";
        return view('admin.store.create', compact(['blade','fieldName']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Update Stores";
        $data = Stores::where(['id'=>$this->id])->first();
        return view('admin.store.edit', compact(['data','blade','fieldName']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request)){
            Stores::where('id',$this->request->compId)->update([
                'title' => $this->request->title,
                'email' => $this->request->email,
                'mobile_number' => $this->request->mobile_number,
                'description' => $this->request->description,
            ]);
            if($this->request->image != 'undefined'){
                $imgName = now()->timestamp;
                $this->request->image->move(public_path('images/store/'), $imgName);
                Stores::where('id',$this->request->compId)->update([
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
        Stores::where('id', $this->id)->delete();
        return redirect()->back();
    }
}