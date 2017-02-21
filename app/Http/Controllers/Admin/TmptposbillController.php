<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tmptposbill;
use Datatables;
use DB;

class TmptposbillController extends Controller
{
    public $controller = 'tmptposbillcontroller';
    public $view = 'table';

    public function __construct()
    {
        $this->model = new Tmptposbill;
    }

    public function index() {
        $count = $this->model->getTable()->count();
    	return view('table.tmp_t_pos_bill')->with('count', $count);
    }

    public function show($type = null) {
    	if ($type == 'datatables') {
            $tmp = $this->model->getTable()->get();
            $request_details= collect($tmp);            
            return Datatables::of($request_details)
            ->addColumn('action', function ($data) {})->make(true);
        } else {
            return redirect()->route('admin::'.$this->controller.'.index');
        }
    }
}
