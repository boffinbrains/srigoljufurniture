<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\Permission;
use App\Models\RolePermissions;
use Auth;

class RoleController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Roles";
    }

    public function operate(Request $request,$func='list',$id =null){
        $this->id       = $id;
        $this->request  = $request;
        return $this->{$func}();
    }

    public function list()
    {
        $fieldName = $this->Field;
        $data = Roles::all();
        $blade = "Roles List";
        return view('admin.role.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $Roles = Roles::all();
            $checkTitleExist = true;
            foreach($Roles as $Title){
                if($Title->title === $this->request->title){
                    $checkTitleExist = false;
                }
            }
            if($checkTitleExist){
                $Roles = new Roles();
                $Roles->name = $this->request->name;
                $Roles->title = $this->request->title;
                $Roles->description = $this->request->description;
                $Roles->save();
                $roles_id = Roles::latest()->first()->id;
                $permission = explode(',', $this->request->permissions);
                for($i=0; $i<count($permission); $i++){
                    RolePermissions::create([
                        'role_id' => $roles_id,
                        'permission_id' => $permission[$i]
                    ]);
                }
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
        $status = Roles::where(['id'=>$this->id]);
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
        $permissions = Permission::all();
        $blade = "Add New Roles";
        return view('admin.role.create', compact(['blade','fieldName','permissions']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $roles = Roles::all();
        $permissions = Permission::all();
        $blade = "Update Roles";
        $data = Roles::where(['id'=>$this->id])->first();
        $rolePermission = RolePermissions::where('role_id',$data->id)->pluck('permission_id')->toArray();
        return view('admin.role.edit', compact(['data','blade','fieldName','roles','permissions','rolePermission']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request)){
            $Roles = Roles::where('id','!=',$this->request->compId)->get();
            foreach($Roles as $Title){
                if($Title->title === $this->request->title){
                    $checkTitleExist = false;
                }else{
                    $checkTitleExist = true;
                }
            }
            if($checkTitleExist){
                Roles::where('id',$this->request->compId)->update([
                    'title' => $this->request->title,
                    'name' => $this->request->name,
                    'description' => $this->request->description,
                ]);
                $permission = explode(',', $this->request->permissions);
                RolePermissions::where('role_id', $this->request->compId)->delete();
                for($i=0; $i<count($permission); $i++){
                    RolePermissions::create([
                        'role_id' => $this->request->compId,
                        'permission_id' => $permission[$i]
                    ]);
                }
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
        Roles::where('id', $this->id)->delete();
        RolePermissions::where('role_id', $this->id)->delete();
        return redirect()->back();
    }
}
