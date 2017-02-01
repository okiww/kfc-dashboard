<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Tmptposbill extends Model
{
    public $table = 'tmp_tpos_bill';
    protected $fillable = [];

    public function getTable()
    {
    	return DB::table('tmp_tpos_bill');
    }
}
