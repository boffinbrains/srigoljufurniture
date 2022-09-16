<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use Illuminate\Support\Facades\Gate;

class BankController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Bank";
    }

    public function operate(Request $request,$func='list',$id =null){
        $this->id       = $id;
        $this->request  = $request;
        return $this->{$func}();
    }

    public function list()
    {
        $fieldName = $this->Field;
        $data = Bank::all();
        $blade = "List Banks";
        return view('admin.bank.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $Bank = new Bank();
            $Bank->title = $this->request->title;
            $Bank->name = $this->request->name;
            $Bank->number = $this->request->number;
            $Bank->ifsc_code = $this->request->ifsc_code;
            $Bank->save();
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
        $status = Bank::where(['id'=>$this->id]);
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
        $blade = "Add New Bank";
        return view('admin.bank.create', compact(['blade','fieldName']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Update Bank";
        $data = Bank::where(['id'=>$this->id])->first();
        return view('admin.bank.edit', compact(['data','blade','fieldName']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request)){
            Bank::where('id',$this->request->compId)->update([
                'title' => $this->request->title,
                'name' => $this->request->name,
                'number' => $this->request->number,
                'ifsc_code' => $this->request->ifsc_code,
            ]);
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
        Bank::where('id', $this->id)->delete();
        return redirect()->back();
    }
}
