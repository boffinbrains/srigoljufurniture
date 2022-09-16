<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Term;
use App\Models\Category;

class TermController extends Controller
{
    private $blade;

    public function __construct()
    {
        $this->Field = "Term";
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
        $data = Term::all();
        $blade = "Stores List";
        return view('admin.termscondition.index', compact(['data','blade','fieldName']));
    }
}