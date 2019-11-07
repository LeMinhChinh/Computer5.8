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
                    ->select('dp.*','s.ram','s.cpu','s.color','s.operating_system','s.id AS id_spec','s.hard_drive','s.screen','s.battery','s.size','s.weight')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->get();
        return $data;
    }

    public function getAllDataByCreateAt()
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.status','p.price','p.promo_price','tt.id_type','p.image','p.name')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->where('p.status',1)
                    ->orderBy('created_at','DESC')
                    ->take(6)
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

    public function updateDetailProductById($data, $id)
    {
        $up = DB::table('detail_product')
                ->where('id_product', $id)
                ->update($data);
        return $up;
    }

    public function addProductToCart($id)
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.name','p.image','p.price','p.promo_price','s.ram','s.cpu','s.color','p.id AS id_product')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->where('dp.id',$id)
                    ->first();
        return $data;
    }
}
