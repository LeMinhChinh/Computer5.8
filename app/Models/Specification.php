<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Specification extends Model
{
    protected $table = 'specification';

    public function getAllData()
    {
        $data = DB::table('specification AS s')
                    ->select('s.*')
                    ->get();
        return $data;
    }

    public function insertDataSpec($data)
    {
        $insert = DB::table('specification')->insert($data);

        if($insert){
            return true;
        }else{
            return false;
        }
    }
}
