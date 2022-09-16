<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Roles;
use Hash;

class UserController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Users";
    }

    public function operate(Request $request,$func='list',$id =null){
        $this->id       = $id;
        $this->request  = $request;
        return $this->{$func}();
    }

    public function list()
    {
        $fieldName = $this->Field;
        $data = User::all()->skip(1);
        $blade = "User List";
        return view('admin.user.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $user = User::all();
            foreach($user as $email){
                if($email->email === $this->request->email){
                    $checkEmailExist = false;
                }else{
                    $checkEmailExist = true;
                }
            }
            foreach($user as $mobile_number){
                if($mobile_number->mobile_number === $this->request->mobile_number){
                    $checkNumberExist = false;
                }else{
                    $checkNumberExist = true;
                }
            }
            if($checkEmailExist && $checkNumberExist){
                $User = new User();
                $User->name = $this->request->name;
                $User->mobile_number = $this->request->mobile_number;
                $User->role = $this->request->role;
                $User->email = $this->request->email;
                $User->password = Hash::make($this->request->password);
                $User->save();
                return response()->json([
                    'message'=>'Data Inserted Successfully!',
                ],200);
            }else{
                return response()->json([
                    'message'=>'Email or Mobile Number has already exist!',
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
        $status = User::where(['id'=>$this->id]);
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
        $roles = Roles::all();
        $blade = "Add New user";
        return view('admin.user.create', compact(['blade','fieldName','roles']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $roles = Roles::all();
        $blade = "Update User";
        $data = User::where(['id'=>$this->id])->first();
        return view('admin.user.edit', compact(['data','blade','fieldName','roles']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request)){
            User::where('id',$this->request->compId)->update([
                'mobile_number' => $this->request->mobile_number,
                'role' => $this->request->role,
                'name' => $this->request->name,
                'email' => $this->request->email,
            ]);   
             if($this->request->password){
                User::where('id',$this->request->compId)->update([
                    'password' => Hash::make($this->request->password),
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
        User::where('id', $this->id)->delete();
        return redirect()->back();
    }
}
