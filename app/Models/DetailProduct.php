<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailProduct extends Model
{
    protected $table = 'detail_product';

    public function getAllData()
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*')
                    ->get();
        return $data;
    }

    public function getDataProductById($id)
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.price','p.percent','p.promo_price','p.image','p.name','s.*','t.type','tt.name_type','t.id AS id_typepr')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS t','tt.id_type','=','t.id')
                    ->where('dp.id',$id)
                    ->first();
        return $data;
    }

    public function insertProductDetail($data)
    {
        $insert = DB::table('detail_product')->insert($data);
    	if($insert){
    		return true;
    	}
    	return false;
    }
}
