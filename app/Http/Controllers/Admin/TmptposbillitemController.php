<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tmptposbillitem;
use Datatables;
use DB;

class TmptposbillitemController extends Controller
{
    public $controller = 'tmptposbillitemcontroller';
    public $view = 'table';

    public function __construct()
    {
        $this->model = new Tmptposbillitem;
    }

    public function index() {
        $count = $this->model->getTable()->count();
    	return view('table.tmp_tpos_bill_item')->with('count', $count);
    }

    public function show($type = null) {
    	 if ($type == 'datatables') {
            $tmp = $this->model->getTable()->limit(10)->get();
            \Log::info($tmp);
            $request_details= collect($tmp);     
            return Datatables::of($request_details)
            ->addColumn('action', function ($data) {})->make(true);
        } else {
            return redirect()->route('admin::'.$this->controller.'.index');
        }
    }
}
