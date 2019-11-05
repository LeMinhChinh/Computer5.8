<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class TypeTrade extends Model
{
    protected $table = 'type_trade';

    public function getAllData()
    {
        $data = DB::table('type_trade AS tt')
                    ->select('tt.*')
                    ->get();
        return $data;
    }
    public function getAllDataTT()
    {
        $data = DB::table('type_trade AS tt')
                    ->select('tt.*')
                    ->get();
        return $data;
    }
}
