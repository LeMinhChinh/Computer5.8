<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AccountController extends Controller
{
    public function account(Request $request,User $user)
    {
        $lstAccount = $user->getAllData();
        $data['paginate'] = $lstAccount;
        $lstAccount = \json_decode(json_encode($lstAccount),true);

        $data['lstAccount'] = $lstAccount['data'] ?? [];
        $data['updateAccountSuccess'] = $request->session()->get('updateAccountSuccess');

        return view('admin.account.account',$data);
    }

    public function updateAccount(Request $request, User $account,$id)
    {
        $id = is_numeric($id) ? $id : '';
        $infoAccount = $account->getInfoDataById($id);

        if($infoAccount){
            $data['info'] = $infoAccount;
            $data['messages'] = $request->session()->get('messages');
            $data['updateAccountError'] = $request->session()->get('updateAccountError');
            return view('admin.account.edit',$data);
        }else{
            abort('404');
        }
    }

    public function handleUpdateAccount(Request $request,User $account)
    {
        $role = $request->roleAcc;
        $role = in_array($role, ['0','1']) ? $role : 0;
        $stt = $request->sttAcc;
        $stt =  in_array($stt, ['0','1']) ? $stt : 0;

        $idAcc = $request->id;
        $idAcc = is_numeric($idAcc) ? $idAcc : '';
        $infoAccount = $account->getInfoDataById($idAcc);

        $dataUpdata = [
            'role' => $role,
            'status' => $stt
        ];

        $update = $account->updateAccountById($dataUpdata, $idAcc);
        if($update){
            $request->session()->flash('updateAccountSuccess','Cập nhật người dùng thành công');
            return redirect()->route('admin.account');
        }else{
            $request->session()->flash('updateAccountError','Cập nhật người dùng thất bại');
            return redirect()->route('admin.editAccount');
        }
    }

    public function deleteAccount(Request $request, User $account)
    {
        $idAcc = $request->id;
        $idAcc = is_numeric($idAcc) ? $idAcc : 0;
        if($idAcc > 0){
            $del = $account->deleteAccountById($idAcc);
            if($del){
                echo "Success";
            } else {
                echo "Fail";
            }
        } else {
            echo "Error";
        }
    }
}
