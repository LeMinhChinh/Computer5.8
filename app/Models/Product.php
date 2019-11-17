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
                    ->select('p.*','tp.type','tm.name_trade','tp.id AS id_type','tm.name_trade')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->join('trademark AS tm','tm.id','=','tt.id_trade')
                    ->orderBy('p.id','ASC')
                    ->where('p.name', 'like', '%'.$keyword.'%')
                    ->paginate(10);
        return $data;
    }

    public function getName()
    {
        $data = DB::table('product AS p')
                    ->select('p.*','tp.id AS id_type')
                    ->join('type_trade AS tt','tt.id','=','p.id_typetrade')
                    ->join('type_product AS tp','tp.id','=','tt.id_type')
                    ->orderBy('p.id','ASC')
                    ->get();
        return $data;
    }

    public function insertProduct($data)
    {
        DB::table('product')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    public function deleteProduct($id)
    {
        $del = DB::table('product')
                    ->where('id', $id)
                    ->delete();
        return $del;
    }

    public function getInfoProductById($id)
    {
        $data = DB::table('product AS p')
                ->select('p.*', 'dp.*')
                ->join('detail_product AS dp', 'dp.id_product', '=', 'p.id')
                ->where('p.id', $id)
                ->first();
        $data = json_decode(json_encode($data),true);
        return $data;
    }

    public function editProduct($data, $id)
    {
        $up = DB::table('product')
                ->where('id',$id)
                ->update($data);
        return $up;
    }
}
