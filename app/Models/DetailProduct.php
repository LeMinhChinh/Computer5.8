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
                    ->select('dp.*','p.price','p.promo_price','tt.id_type','p.image','p.name','s.color','s.ram','s.cpu')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->orderBy('created_at','DESC')
                    ->take(6)
                    ->get();
        return $data;
    }

    public function getDataProductById($id)
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.price','p.percent','p.promo_price','p.image','p.name','s.*','t.type','tt.name_type','t.id AS id_typepr','tt.id AS id_tt')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS t','tt.id_type','=','t.id')
                    ->where('dp.id',$id)
                    ->first();
        return $data;
    }

    public function getAllDataLaptop()
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.price','p.promo_price','tt.id_type','p.image','p.name','s.color','s.ram','s.cpu','tt.id AS id_tt')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->where('tt.id_type',1)
                    ->take(8)
                    ->get();
        return $data;
    }

    public function getAllDataPC()
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.price','p.promo_price','tt.id_type','p.image','p.name','s.color','s.ram','s.cpu','tt.id AS id_tt')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->where('tt.id_type',2)
                    ->take(8)
                    ->get();
        return $data;
    }

    public function getAllProductByIdType($idtype)
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.price','p.promo_price','tt.id_type','p.image','p.name','s.color','s.ram','s.cpu')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->where('tp.id',$idtype)
                    ->paginate(12);
        return $data;
    }

    public function getAllLaptopByTypeTrade($idtrade)
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.price','p.promo_price','tt.id_type','p.image','p.name','s.color','s.ram','s.cpu')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('trademark AS tm','tm.id','=','tt.id_trade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->where('tp.id',1)
                    ->where('tm.id',$idtrade)
                    ->get();
        return $data;
    }

    public function getAllPCByTypeTrade($idtrade)
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.price','p.promo_price','tt.id_type','p.image','p.name','s.color','s.ram','s.cpu')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('trademark AS tm','tm.id','=','tt.id_trade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->where('tp.id',2)
                    ->where('tm.id',$idtrade)
                    ->get();
        return $data;
    }

    public function getAllLaptopAdmin($keyword = '')
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.name','tt.id_type','tm.name_trade','s.ram','s.cpu','s.color','s.screen','s.hard_drive','s.battery','s.operating_system','s.size','s.weight')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->join('trademark AS tm','tm.id','=','tt.id_trade')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->where('p.name', 'like', '%'.$keyword.'%')
                    ->where('tt.id_type',1)
                    ->orderBy('dp.id','ASC')
                    ->paginate(10);
        return $data;
    }

    public function getAllPcAdmin($keyword = '')
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.name','tt.id_type','tm.name_trade','s.ram','s.cpu','s.color','s.screen','s.hard_drive','s.battery','s.operating_system','s.size','s.weight')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->join('trademark AS tm','tm.id','=','tt.id_trade')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->where('p.name', 'like', '%'.$keyword.'%')
                    ->where('tt.id_type',2)
                    ->orderBy('dp.id','ASC')
                    ->paginate(10);
        return $data;
    }

    public function deleteDetail($id)
    {
        $del = DB::table('detail_product')
                    ->where('id', $id)
                    ->delete();
        return $del;
    }

    public function insertProductDetail($data)
    {
        DB::table('detail_product')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    public function updateDetailProductById($data, $id)
    {
        $up = DB::table('detail_product')
                ->where('id', $id)
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

    public function getInfoDetailById($id)
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.name','p.image','s.ram','s.cpu','s.color','s.screen','s.hard_drive','s.battery','s.operating_system','s.size','s.weight','tp.id AS id_type')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->where('dp.id',$id)
                    ->first();
        return $data;
    }

    public function getInfoSearch($keyword)
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.price','p.promo_price','p.image','p.name','s.color','s.ram','s.cpu')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->where('p.name','like','%'.$keyword.'%')
                    ->get();
        return $data;
    }

    public function getDataSimilar($idtt,$id)
    {
        $data = DB::table('detail_product AS dp')
                    ->select('dp.*','p.name','p.image','p.id_typetrade','s.ram','s.cpu','s.color','p.price','p.promo_price')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->where('p.id_typetrade',$idtt)
                    ->where('dp.id','<>', $id)
                    ->orderBy('p.promo_price','DESC')
                    ->take(4)
                    ->get();
        return $data;
    }
}
