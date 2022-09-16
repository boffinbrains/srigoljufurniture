<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;

class CustomerController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Customers";
    }

    public function operate(Request $request,$func='list',$id =null){
        $this->id       = $id;
        $this->request  = $request;
        return $this->{$func}();
    }

    public function list()
    {
        $fieldName = $this->Field;
        $data = Customer::all();
        $blade = "Customers List";
        return view('admin.customer.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $Customer = new Customer();
            $Customer->company = $this->request->company;
            $Customer->contact_person = $this->request->contact_person;
            $Customer->phone_number = $this->request->phone_number;
            $Customer->mobile_number = $this->request->mobile_number;
            $Customer->email = $this->request->email;
            $Customer->address = $this->request->address;
            $Customer->contact_person_address = $this->request->contact_person_address;
            $Customer->birthday = $this->request->birthday;
            $Customer->anniversary = $this->request->anniversary;
            $Customer->profession = $this->request->profession;
            $Customer->save();
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
        $status = Customer::where(['id'=>$this->id]);
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
        $blade = "Add New customer";
        return view('admin.customer.create', compact(['blade','fieldName']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Update customer";
        $data = Customer::where(['id'=>$this->id])->first();
        return view('admin.customer.edit', compact(['data','blade','fieldName']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request)){
            Customer::where('id',$this->request->compId)->update([
                'company' => $this->request->company,
                'contact_person' => $this->request->contact_person,
                'phone_number' => $this->request->phone_number,
                'mobile_number' => $this->request->mobile_number,
                'email' => $this->request->email,
                'address' => $this->request->address,
                'contact_person_address' => $this->request->contact_person_address,
                'birthday' => $this->request->birthday,
                'anniversary' => $this->request->anniversary,
                'profession' => $this->request->profession
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
        Customer::where('id', $this->id)->delete();
        return redirect()->back();
    }

    public function importCsv()
    {
        Excel::import(new CustomerImport,request()->file('file'));
        return redirect()->back();
    }
}