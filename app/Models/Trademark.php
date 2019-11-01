<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Trademark extends Model
{
    protected $table = 'trademark';

    public function getAllDataTrade()
    {
        $data = DB::table('trademark AS tm')
                    ->select('tm.*')
                    ->get();
        return $data;
    }
}
