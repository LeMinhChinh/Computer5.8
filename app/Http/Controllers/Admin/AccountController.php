<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AccountController extends Controller
{
    public function account(User $user)
    {
        $lstAccount = $user->getAllData();
        $lstAccount = \json_decode(json_encode($lstAccount),true);
        // dd($lstAccount);

        $data['lstAccount'] = $lstAccount;

        return view('admin.account.account',$data);
    }
}
