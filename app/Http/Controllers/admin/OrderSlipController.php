<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderSlip;
use App\Models\OrderSlipItem;
use Auth;
use Session;
use PDF;

class OrderSlipController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Orders Slip";
    }

    public function operate(Request $request,$func='list',$id =null){
        $this->id       = $id;
        $this->request  = $request;
        return $this->{$func}();
    }

    public function list()
    {
        $fieldName = $this->Field;
        $data = OrderSlip::all()->sortBy("id");
        $blade = "Order Slip List";
        return view('admin.order-slip.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $order_slip = new OrderSlip();
            $order_slip->order_number = $this->request->order_number;
            $order_slip->added_date = $this->request->added_date;
            $order_slip->customer_name = $this->request->customer_name;
            $order_slip->customer_number = $this->request->customer_number;
            $order_slip->save();
            session([
                'order_slip_id' => $order_slip->latest()->first()->id
            ]);
            return response()->json([
                'message'=>'Data Inserted Successfully!',
                'stepper'=>true,
            ],200);
        }else{
            return response()->json([
                'message'=>'Something Went Wrong!',
            ],403);
        }
    }

    public function createItems()
    {
        $order_slip_id = $this->request->session()->get('order_slip_id');
        if(isset($this->request)){
            $data = $this->request->json()->all();
            $count = count($data['item_name']);
            for($i=0; $i<$count; $i++){
                $OrderSlipItem = new OrderSlipItem();
                $OrderSlipItem->item_name = $data['item_name'][$i];
                $OrderSlipItem->fabric = $data['fabric'][$i];
                $OrderSlipItem->width = $data['width'][$i];
                $OrderSlipItem->height = $data['height'][$i];
                if($data['item_image']){
                    $OrderSlipItem->item_image = $data['item_image'][$i];
                }
                $OrderSlipItem->order_slip_id = $order_slip_id;
                $OrderSlipItem->save();
            }
            $this->request->session()->forget('order_slip_id');
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

    public function status()
    {
        $this->authorize('isAdmin');
        $status = OrderSlip::where(['id'=>$this->id]);
        if($status->first()->status){
            $status->update(['status'=>false]);
        }else{
            $status->update(['status'=>true]);
        }
        return redirect()->back();
    }

    public function add()
    {
        if(OrderSlip::all()->isEmpty()){
            $order_number = "SGFI" . date('ymd') . '001';
        }else{
            $ref_no = OrderSlip::latest()->first()->order_number;
            $lastDigit = substr($ref_no,-1) + 1;
            $order_number = substr_replace($ref_no, $lastDigit, -1);
        }
        $fieldName = $this->Field;
        $blade = "Add New Order Slip";
        return view('admin.order-slip.create', compact(['blade','fieldName','order_number']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Update OrderSlip";
        $data = OrderSlip::where(['id'=>$this->id])->first();
        $item = OrderSlipItem::where('order_slip_id',$this->id)->get();
        return view('admin.order-slip.edit', compact(['data','blade','fieldName','item']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request)){
            $fields = OrderSlip::where('id',$this->request->compId)->first();
            OrderSlip::where('id',$this->request->compId)->update([
                'order_number' => $fields->order_number,
                'customer_name' => $this->request->customer_name,
                'customer_number' => $this->request->customer_number,
                'added_date' => $this->request->added_date,
            ]);
            return response()->json([
                'message'=>'Data Updated Successfully!',
                'stepper'=>true,
            ],200);
        }else{
            return response()->json([
                'message'=>'Something Went Wrong!',
            ],403);
        }
    }
    
    public function updateItems()
    {
        $this->authorize('isAdmin');
        if(isset($this->request)){
            $data = $this->request->json()->all();
            OrderSlipItem::where('order_slip_id', $data['compId'])->delete();
            $count = count($data['item_name']);
            for($i=0; $i<$count; $i++){
                $OrderSlipItem = new OrderSlipItem();
                $OrderSlipItem->item_name = $data['item_name'][$i];
                $OrderSlipItem->fabric = $data['fabric'][$i];
                $OrderSlipItem->width = 0;//$data['width'][$i];
                $OrderSlipItem->height = 0;//$data['height'][$i];
                if($data['item_image']){
                    $OrderSlipItem->item_image = $data['item_image'][$i];
                }
                $OrderSlipItem->order_slip_id = $data['compId'];
                $OrderSlipItem->save();
            }
            $this->request->session()->forget('order_slip_id');
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

    public function delete()
    {
        $this->authorize('isAdmin');
        OrderSlip::where('id', $this->id)->delete();
        OrderSlipItem::where('order_slip_id', $this->id)->delete();
        return redirect()->back();
    }

    public function imageUpload()
    {
        if ($this->request->hasFile('image')) {
            $image          =   $this->request->file('image');
            $filename       =   $image->getClientOriginalName();//time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/order-slip/'),$filename);
            return true;
        }
        else{
            return false;
        }
        /*if($this->request->image){
            $fileName = $this->request->image;//now()->timestamp.;
            $this->request->image->move(public_path('images/order-slip/'), $fileName);
            return true;
        }else{
            return false;
        }*/
    }

    public function createPdf()
    {
        $data = OrderSlip::where('id',$this->id)->first();
        $items = OrderSlipItem::where('order_slip_id',$this->id)->get();
        view()->share([
            'data'=>$data,
            'items'=>$items,
        ]);
        
        $pdf = PDF::loadView('admin.order-slip.pdf', compact('data','items'));
        return $pdf->download('Order-Slip.pdf');
    }

}