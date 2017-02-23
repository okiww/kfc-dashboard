<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Menu extends Model
{
    public $table = 'menu_parents';


    public function menus()
    {
        return Menu::select('*')->get();
    }

    public function menuChilds()
    {
        return $this->hasMany('App\Models\MenuChild');
    }
}
