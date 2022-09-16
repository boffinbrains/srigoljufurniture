<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Presentation;
use App\Models\Brands;

class PresentationController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Presentations";
    }

    public function operate(Request $request,$func='list',$id =null){
        $this->id       = $id;
        $this->request  = $request;
        return $this->{$func}();
    }

    public function list()
    {
        $fieldName = $this->Field;
        $data = Presentation::where('presentations.status',1)
        ->join('brands', 'presentations.brand_id', '=', 'brands.id')
        ->select('presentations.*','brands.title as brandName')
        ->get();
        $blade = "Presentations List";
        return view('admin.presentation.index', compact(['data','blade','fieldName']));
    }

    public function create()
    {
        if(isset($this->request)){
            $Presentation = new Presentation();
            $Presentation->title = $this->request->title;
            $Presentation->brand_id = $this->request->brand_id;
            $Presentation->type = $this->request->type;
            if($this->request->type === 'image'){
                $imgName = now()->timestamp;
                $this->request->image->move(public_path('images/presentation/'), $imgName);
                $Presentation->image = $imgName;
            }else if($this->request->type === 'video'){
                $Presentation->video = $this->request->video;
            }
            $Presentation->save();
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
        $status = Presentation::where(['id'=>$this->id]);
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
        $blade = "Add New Presentation";
        $brands = Brands::all();
        return view('admin.presentation.create', compact(['blade','fieldName','brands']));
    }

    public function edit()
    {
        $this->authorize('isAdmin');
        $fieldName = $this->Field;
        $blade = "Update Presentation";
        $data = Presentation::where(['id'=>$this->id])->first();
        $brands = Brands::all();
        return view('admin.presentation.edit', compact(['data','blade','fieldName','brands']));
    }

    public function update()
    {
        $this->authorize('isAdmin');
        if(isset($this->request)){
            Presentation::where('id',$this->request->compId)->update([
                'title' => $this->request->title,
                'type' => $this->request->type,
                'brand_id' => $this->request->brand_id
            ]);
            if($this->request->type === 'image'){
                if($this->request->image != 'undefined'){
                    $imgName = now()->timestamp;
                    $this->request->image->move(public_path('images/presentation/'), $imgName);
                    Presentation::where('id',$this->request->compId)->update([
                        'image' => $imgName,
                        'video' => '',
                    ]);
                }
            }else if($this->request->type === 'video'){
                Presentation::where('id',$this->request->compId)->update([
                    'video' => $this->request->video,
                    'image' => '',
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
        Presentation::where('id', $this->id)->delete();
        return redirect()->back();
    }
}