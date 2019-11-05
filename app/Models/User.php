<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = 'account';

    public function getAllData()
    {
        $data = DB::table('account AS a')
                    ->select('a.*')
                    ->get();
        return $data;
    }

    public function checkUserLogin($user, $pass)
    {
        $data = [];
        $info = User::select('*')
                    ->where([
                        'email' => $user,
                        'password' => md5($pass),
                        'status' => 1
                    ])
                    ->first();
        if($info){
            $data = $info->toArray();
        }
        return $data;
    }

    public function registerUser($data)
    {
        DB::table('account')->insert($data);
        $id = DB::getPdo()->lastInsertId();
        return $id;
    }

    public function getInfoDataById($id)
    {
        $data = DB::table('account AS a')
                    ->select('a.*')
                    ->where('a.id',$id)
                    ->first();
        $data = \json_decode(json_encode($data),true);
        return $data;
    }

    public function updateAccountById($data, $id)
    {
        $up = DB::table('account AS a')
                    ->where('a.id',$id)
                    ->update($data);
        return $up;
    }

    public function deleteAccountById($id)
    {
        $del = DB::table('account')
                    ->where('id', $id)
                    ->delete();
        return $del;
    }
}
