<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class OrderCart extends Model
{
    protected $table = 'order_cart';

    public function getAllOrder($id)
    {
        $data = DB::table('order_cart AS o')
                    ->select('o.*')
                    ->join('account AS a','a.id','=','o.id_acc')
                    ->where('o.id_acc',$id)
                    ->get();
        return $data;
    }
}
