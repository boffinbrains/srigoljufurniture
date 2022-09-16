<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\Quotation;
use App\Models\QuotationItem;
use App\Models\User;
use App\Models\Roles;
use Auth;
use Session;
use PDF;

class QuotationController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Quotation";
    }

    public function operate(Request $request,$func='list',$id =null){
        $this->id       = $id;
        $this->request  = $request;
        return $this->{$func}();
    }

    public function list()
    {
        $fieldName = $this->Field;
        $data = Quotation::all();
        $blade = "List Quotations";
        return view('admin.quotation.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $Quotation = new Quotation();
            $Quotation->reference_number = $this->request->reference_number;
            $Quotation->client_name = $this->request->client_name;
            $Quotation->price_type = $this->request->price_type;
            $Quotation->discount_type = $this->request->discount_type;
            $Quotation->sector = $this->request->sector;
            $Quotation->terms_and_conditions = $this->request->terms_and_conditions;
            $Quotation->bank_id = $this->request->bank_id;
            $Quotation->added_date = $this->request->added_date;
            $Quotation->discount = $this->request->discount;
            $Quotation->sub_total = 0;
            $Quotation->grand_total = 0;
            $Quotation->made_by = Auth::id();
            $Quotation->save();
            session([
                'quotation_id' => $Quotation->latest()->first()->id
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
        $quotation_id = $this->request->session()->get('quotation_id');
        if(isset($this->request)){
            $data = $this->request->json()->all();
            $count = count($data['product_name']);
            for($i=0; $i<$count; $i++){
                $QuotationItem = new QuotationItem();
                $QuotationItem->name = $data['product_name'][$i];
                $QuotationItem->quantity = $data['qty'][$i];
                $QuotationItem->unit_price = $data['price'][$i];
                $QuotationItem->rate = $data['rate'][$i];
                $QuotationItem->discounted_total = $data['item_total'][$i];
                if($data['color']){
                    $QuotationItem->color = $data['color'][$i];
                }
                if($data['product_desc']){
                    $QuotationItem->description = $data['product_desc'][$i];
                }
                if($data['product_img']){
                    $QuotationItem->image = $data['product_img'][$i];
                }
                if($data['item_discount']){
                    $QuotationItem->item_discount = $data['item_discount'][$i];
                }
                $QuotationItem->quotation_id = $quotation_id;
                $QuotationItem->save();
            }
            $sub_total = round(str_replace(',', '',$data['sub_total'][0]));
            $discount = Quotation::where('id',$quotation_id)->first()->discount;
            Quotation::where('id',$quotation_id)->update([
                'sub_total' => $sub_total,
                'grand_total' => $discount ? $sub_total - ($sub_total * ($discount / 100)) : $sub_total,
            ]);
            $this->request->session()->forget('quotation_id');
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
        $status = Quotation::where(['id'=>$this->id]);
        if($status->first()->status){
            $status->update(['status'=>false]);
        }else{
            $status->update(['status'=>true]);
        }
        return redirect()->back();
    }

    public function add()
    {
        $banks = Bank::all();
        // if(Quotation::all()->isEmpty()){
        //     $reference_number = "SGFI" . date('ymd') . '001';
        // }else{
        //     $ref_no = Quotation::latest()->first()->reference_number;
        //     $lastDigit = substr($ref_no,-1) + 1;
        //     $reference_number = substr_replace($ref_no, $lastDigit, -1);
        // }
        $reference_number = "SGFI".now()->timestamp;
        $fieldName = $this->Field;
        $blade = "Add New Quotation";
        $terms_and_conditions = "<ul><li>50% Advance payment &amp; rest before 2 days of delivery.</li><li>Transport Rs.1200 will be extra, as actual.</li><li>Delivery period 15 days receive of p.o date.</li><li>G.S.T will be extra, as actual.</li></ul><p><br></p><p></p>";
        return view('admin.quotation.create', compact(['blade','fieldName','terms_and_conditions','banks','reference_number']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $banks = Bank::all();
        $fieldName = $this->Field;
        $blade = "Update Quotation";
        $data = Quotation::where(['id'=>$this->id])->first();
        $item = QuotationItem::where(['quotation_id'=>$this->id])->get();
        return view('admin.quotation.edit', compact(['data','blade','fieldName','banks','item']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request)){
            $fields = Quotation::where('id',$this->request->compId)->first();
            Quotation::where('id',$this->request->compId)->update([
                'reference_number' => $fields->reference_number,
                'client_name' => $this->request->client_name,
                'price_type' => $this->request->price_type,
                'discount_type' => $this->request->discount_type,
                'sector' => $this->request->sector,
                'terms_and_conditions' => $this->request->terms_and_conditions,
                'bank_id' => $this->request->bank_id,
                'added_date' => $this->request->added_date,
                'discount' => $this->request->discount,
                'sub_total' => $fields->sub_total,
                'grand_total' => $fields->grand_total,
                'made_by' => $fields->made_by,
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
            QuotationItem::where('quotation_id', $data['compId'])->delete();
            $count = count($data['product_name']);
            for($i=0; $i<$count; $i++){
                $QuotationItem = new QuotationItem();
                $QuotationItem->name = $data['product_name'][$i];
                $QuotationItem->quantity = $data['qty'][$i];
                $QuotationItem->unit_price = $data['price'][$i];
                $QuotationItem->rate = $data['rate'][$i];
                $QuotationItem->discounted_total = $data['item_total'][$i];
                if($data['color']){
                    $QuotationItem->color = $data['color'][$i];
                }
                if($data['product_desc']){
                    $QuotationItem->description = $data['product_desc'][$i];
                }
                if($data['product_img']){
                    $QuotationItem->image = $data['product_img'][$i];
                }
                if($data['item_discount']){
                    $QuotationItem->item_discount = $data['item_discount'][$i];
                }
                $QuotationItem->quotation_id = $data['compId'];
                $QuotationItem->save();
            }
            $sub_total = round(str_replace(',', '',$data['sub_total'][0]));
            $discount = Quotation::where('id',$data['compId'])->first()->discount;
            Quotation::where('id',$data['compId'])->update([
                'sub_total' => $sub_total,
                'grand_total' => $discount ? $sub_total - ($sub_total * ($discount / 100)) : $sub_total
            ]);
            $this->request->session()->forget('quotation_id');
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
        Quotation::where('id', $this->id)->delete();
        QuotationItem::where('quotation_id', $this->id)->delete();
        return redirect()->back();
    }

    public function imageUpload()
    {
        if($this->request->image){
            $fileName = now()->timestamp;
            $this->request->image->move(public_path('images/quotation/'), $fileName);
            return $fileName;
        }else{
            return false;
        }
    }

    public function createPdf()
    {
        $data = Quotation::where('id',$this->id)->first();
        $items = QuotationItem::where('quotation_id',$this->id)->get();
        $bank = Bank::where('id',$data->bank_id)->first();
        $made_by = User::where('id',$data->made_by)->first();
        $designation = Roles::where('id',$made_by->role)->first()->name;
        view()->share([
            'data'=>$data,
            'bank'=>$bank,
            'items'=>$items,
            'made_by'=>$made_by,
            'designation'=>$designation,
        ]);
        $pdf = PDF::loadView('admin.quotation.pdf', compact('data','bank','items','made_by','designation'));
        return $pdf->download('quotation.pdf');
    }
}