<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    protected $table = 'product';

    public function getAllData($keyword = '')
    {
        $data = DB::table('product AS p')
                    ->select('p.*','dp.quantity','tp.type','tm.name_trade','tp.id AS id_type','tm.name_trade')
                    ->join('detail_product AS dp','dp.id_product','=','p.id')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->join('trademark AS tm','tm.id','=','tt.id_trade')
                    ->orderBy('p.id','ASC')
                    ->where('p.name', 'like', '%'.$keyword.'%')
                    ->paginate(15);
        return $data;
    }

    public function getAllDataByCreateAt()
    {
        $data = DB::table('product AS p')
                    ->select('p.*','tt.id_type')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->where('p.status',1)
                    ->orderBy('created_at','DESC')
                    ->take(6)
                    ->get();
        return $data;
    }

    public function getAllDataLaptop()
    {
        $data = DB::table('product AS p')
                    ->select('p.*','tt.id_type')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->where('tt.id_type',1)
                    ->take(8)
                    ->get();
        return $data;
    }

    public function getAllDataPC()
    {
        $data = DB::table('product AS p')
                    ->select('p.*','tt.id_type')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->where('tt.id_type',2)
                    ->take(8)
                    ->get();
        return $data;
    }

    public function getAllProductByIdType($idtype)
    {
        $data = DB::table('product AS p')
                    ->select('p.*','tp.id AS id_type','tp.type')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->where('tp.id',$idtype)
                    ->paginate(12);
        return $data;
    }

    public function getAllLaptopAdmin($keyword = '')
    {
        $data = DB::table('product AS p')
                    ->select('p.*','tt.id_type','tm.name_trade','dp.quantity')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->join('trademark AS tm','tm.id','=','tt.id_trade')
                    ->join('detail_product AS dp','dp.id_product','=','p.id')
                    ->where('p.name', 'like', '%'.$keyword.'%')
                    ->where('tt.id_type',1)
                    ->orderBy('p.id','ASC')
                    ->paginate(15);
        return $data;
    }

    public function getAllPcAdmin($keyword = '')
    {
        $data = DB::table('product AS p')
                    ->select('p.*','tt.id_type','tm.name_trade','dp.quantity')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->join('trademark AS tm','tm.id','=','tt.id_trade')
                    ->join('detail_product AS dp','dp.id_product','=','p.id')
                    ->where('tt.id_type',2)
                    ->where('p.name', 'like', '%'.$keyword.'%')
                    ->orderBy('p.id','ASC')
                    ->paginate(15);
        return $data;
    }

    public function insertProduct($data)
    {
        DB::table('product')->insert($data);
        // Lấy ra id vừa insert
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    public function deleteProduct($id)
    {
        $delete = DB::table('product')
                    ->where('id', $id)
                    ->delete();
        return $del;
    }
}
