<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tmptposbillitem extends Model
{
    public $table = 'tmp_tpos_bill_item';
    protected $fillable = [];

    public function getTable()
    {
    	return DB::table('tmp_tpos_bill_item');
    }
}
