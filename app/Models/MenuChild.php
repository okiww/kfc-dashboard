<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class MenuChild extends Model
{
    public $table = 'menu_child';
    protected $fillable = ['name'];
    protected $hidden =  ['created_at', 'updated_at', 'deleted_at'];

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    public function get($id) {
    	return MenuChild::select('name', 'menu_id')->where('menu_id', $id)->get();
    }
}
