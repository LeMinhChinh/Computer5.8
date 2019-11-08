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

    public function checkInfo($id,User $acc)
    {
        $infoAcc = $acc->getDataById($id);
        $infoAcc = \json_decode(json_encode($infoAcc),true);

        $data['infoAcc'] = $infoAcc;
        $data['idUser'] = Session::get('idSession');
        return view('home.user.checkInfo',$data);
    }

    public function updateInfo($id,User $acc)
    {
        $infoAcc = $acc->getDataById($id);
        $infoAcc = \json_decode(json_encode($infoAcc),true);

        $data['infoAcc'] = $infoAcc;
        $data['idUser'] = Session::get('idSession');
        return view('home.user.updateInfo',$data);
    }
}
