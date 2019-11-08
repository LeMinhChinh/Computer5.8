<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailOrderCart extends Model
{
    protected $table = 'detail_order';

    public function getAllDetailOrder($id)
    {
        $data = DB::table('detail_order AS do')
                    ->select('do.*')
                    ->join('order_cart AS o','o.id','=','do.id_cart')
                    ->where('do.id_cart',$id)
                    ->get();
        return $data;
    }

    public function deleteDetailByIdOrder($id)
    {
        $del = DB::table('detail_order')
                    ->where('id_cart',$id)
                    ->delete();
        return $del;
    }
}
