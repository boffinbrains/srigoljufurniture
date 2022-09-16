<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;

class PermissionController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Permissions";
    }

    public function operate(Request $request,$func='list',$id =null){
        $this->id       = $id;
        $this->request  = $request;
        return $this->{$func}();
    }

    public function list()
    {
        $fieldName = $this->Field;
        $data = Permission::all();
        $blade = "Permissions List";
        return view('admin.permission.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $checkTitleExist = true;
            $Permission = Permission::all();
            foreach($Permission as $Title){
                if($Title->title === $this->request->title){
                    $checkTitleExist = false;
                }
            }
            if($checkTitleExist){
                $Permission = new Permission();
                $Permission->name = $this->request->name;
                $Permission->title = $this->request->title;
                $Permission->description = $this->request->description;
                $Permission->save();
                return response()->json([
                    'message'=>'Data Inserted Successfully!',
                ],200);
            }else{
                return response()->json([
                    'message'=>'Title has already exist!',
                ],200);
            }
        }else{
            return response()->json([
                'message'=>'Something Went Wrong!',
            ],403);
        }
    }

    public function status()
    {
        $this->authorize('isAdmin');
        $status = Permission::where(['id'=>$this->id]);
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
        $Permission = Permission::all();
        $blade = "Add New Permission";
        return view('admin.permission.create', compact(['blade','fieldName','Permission']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $Permission = Permission::all();
        $blade = "Update Permission";
        $data = Permission::where(['id'=>$this->id])->first();
        return view('admin.permission.edit', compact(['data','blade','fieldName','Permission']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request)){
            $Permission = Permission::where('id','!=',$this->request->compId)->get();
            foreach($Permission as $Title){
                if($Title->title === $this->request->title){
                    $checkTitleExist = false;
                }else{
                    $checkTitleExist = true;
                }
            }
            if($checkTitleExist){
                Permission::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
                    'name' => $this->request->name,
                    'description' => $this->request->description,
                ]);
                return response()->json([
                    'message'=>'Data Updated Successfully!',
                    'response'=>true
                ],200);
            }else{
                return response()->json([
                    'message'=>'Title has already exist!',
                ],200);
            }
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
        Permission::where('id', $this->id)->delete();
        return redirect()->back();
    }
}
