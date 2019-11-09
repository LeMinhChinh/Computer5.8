<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeController;
use App\Models\OrderCart;
use App\Models\DetailOrderCart;
use App\Models\DetailProduct;
use App\Models\User;
use Cart;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\validateUpdateInfo;
use Illuminate\Support\Facades\Validator;

class PersonalePageController extends HomeController
{
    public function infoUser(Request $request)
    {
        $data['idUser'] = Session::get('idSession');
        $data['successOrder'] = $request->session()->get('successOrder');
        return view('home.user.info',$data);
    }

    public function checkBill(Request $request,OrderCart $order,$id)
    {
        $info = $order->getAllOrder(Session::get('idSession'));
        $info = \json_decode(\json_encode($info),true);

        $data['info'] = $info;
        $data['idUser'] = Session::get('idSession');
        $data['approvalSuccess'] = $request->session()->get('approvalSuccess');
        $data['deleteSuccess'] = $request->session()->get('deleteSuccess');

        return view('home.user.checkbill',$data);
    }

    public function deleteBill($id,OrderCart $order,Request $request,DetailOrderCart $detailOr)
    {
        $order = OrderCart::find($id);
        $idUser = Session::get('idSession');
        if($order->status == 1){
                $request->session()->flash('approvalSuccess','Đơn hàng của bạn đã được duyệt.Bạn không thể hủy');
                return redirect()->route('user.checkBill',['id'=> $idUser]);
        }else{
            $detailOrder = $detailOr->getAllDetailOrder($id);
            foreach ($detailOrder as $dtOrder) {
                $dtProduct = DetailProduct::find($dtOrder->id_detailproduct);
                $dtProduct->quantity = $dtProduct->quantity + $dtOrder->quantity;
                $dtProduct->save();
                $detailOr->deleteDetailByIdOrder($id);
            }
            $order->delete();
            $request->session()->flash('deleteSuccess','Bạn đã hủy đơn hàng thành công');
            return redirect()->route('user.checkBill',['id'=> $idUser]);
        }
    }

    public function checkInfo(User $acc,Request $request)
    {
        $id = Session::get('idSession');
        $infoAcc = $acc->getDataById($id);
        $infoAcc = \json_decode(json_encode($infoAcc),true);

        $data['infoAcc'] = $infoAcc;
        $data['idUser'] = $id;
        $data['updateInfoSuccess'] = $request->session()->get('updateInfoSuccess');
        return view('home.user.checkInfo',$data);
    }

    public function updateInfo($id,User $acc,Request $request)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        $infoAcc = $acc->getDataById($id);
        $infoAcc = \json_decode(json_encode($infoAcc),true);

        if($infoAcc > 0){
            $data['infoAcc'] = $infoAcc;
            $data['idUser'] = Session::get('idSession');
            $data['messages'] = $request->session()->get('messages');
            $data['errorAvatar'] = $request->session()->get('errorAvatar');
            $data['updateInfoError'] = $request->session()->get('updateInfoError');
            return view('home.user.updateInfo',$data);
        }else{
            abort(404);
        }
    }

    public function handleUpdateInfo(validateUpdateInfo $request,User $acc)
    {
        $username = $request->userAcc;
        $email = $request->emailAcc;
        $fname = $request->fnameAcc;
        $phone = $request->phoneAcc;
        $gender = $request->genAcc;
        $gender =  in_array($gender, ['1','0']) ? $gender : 1;
        $age = $request->ageAcc;
        $address = $request->addAcc;

        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        $infoAcc = $acc->getDataById($id);
        $infoAcc = \json_decode(\json_encode($infoAcc),true);

        $oldAvatar = $infoAcc['avatar'];
        if(isset($_FILES['avtAcc'])){
            if($_FILES['avtAcc']['error'] == 0){
                $validatorAvatar = Validator::make(
                    ['avtAcc' => $request->file('avtAcc')],
                    ['avtAcc' => 'required'],
                    [
                        'required' => 'Vui lòng chọn ảnh'
                    ]
                );

                if($validatorAvatar->fails()){
                    return redirect()->route('user.updateInfo',['id' => $id])
                                    ->withErrors($validatorAvatar)
                                    ->withInput();
                }else{
                    $oldAvatar = $_FILES['avtAcc']['name'];
                    $tmpName  = $_FILES['avtAcc']['tmp_name'];
                    $up = move_uploaded_file($tmpName, public_path() . '/Uploads/avatar/' . $oldAvatar);
                    if(!$up){
                        $request->session()->flash('errorAvatar', 'Lỗi upload ảnh lên server');
                        return redirect()->route('user.updateInfo',['id' => $id]);
                    }
                }
            }
        }
        $dataUpdate = [
            'username' => $username,
            'email' => $email,
            'fullname' => $fname,
            'phone' => $phone,
            'gender' => $gender,
            'age' => $age,
            'address' => $address,
            'avatar' => $oldAvatar,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $update = $acc->updateInfo($dataUpdate, $id);

        if($update){
            $request->session()->flash('updateInfoSuccess', 'Cập nhật thông tin cá nhân thành công');
            return redirect()->route('user.checkInfo',['id' => $id]);
        }else{
            $request->session()->flash('updateInfoError', 'Cập nhật thông tin thất bại.Vui lòng kiểm tra lại');
            return redirect()->route('admin.updateInfo',['id' => $id]);
        }
    }
}
