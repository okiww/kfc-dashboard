<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MenuConroller extends Controller
{
    public $controller = 'menu';
    public $view = 'sidebar';

    public function __construct()
    {
        parent::__construct();
        $this->model = new Menu;
    }

    public index() {
    	// $menus = $this->model->menus();
    	// return view('sidebar', $menus);
    }
}
