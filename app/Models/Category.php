<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'type_product';

    public function getAllDataCate()
    {
        $data = DB::table('type_product AS tp')
                    ->select('tp.*')
                    ->get();
        return $data;
    }

    public function getDataName()
    {
        $data = DB::table('type_product AS tp')
                    ->select('tp.*','tt.id_type','tt.name_type AS name_cate')
                    ->join('type_trade AS tt','tt.id_type','=','tp.id')
                    ->join('trademark AS tm','tt.id_trade','=','tm.id')
                    ->get();
        return $data;
    }
}
