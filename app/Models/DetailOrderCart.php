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

    public function getInfoDetail($id)
    {
        $data = DB::table('detail_order AS do')
                    ->select('do.*','p.name','p.image')
                    ->join('order_cart AS o','o.id','=','do.id_cart')
                    ->join('detail_product AS dp','dp.id','=','do.id_detailproduct')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->where('do.id_cart',$id)
                    ->get();
        return $data;
    }
}
