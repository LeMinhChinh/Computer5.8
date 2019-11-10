<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderCart;
use App\Http\Requests\validateEditBill;

class BillController extends Controller
{
    public function billOrder(Request $request, OrderCart $order)
    {
        $data = [];
        $orderCart = $order->getAllData();
        $orderCart = \json_decode(\json_encode($orderCart),true);

        $data['order'] = $orderCart;
        $data['updateSuccess'] = $request->session()->get('updateSuccess');
        return view('admin.bill.billorder',$data);
    }

    public function editBill($id,Request $request, OrderCart $order)
    {
        $id = is_numeric($id) ? $id : '';
        $info = $order->getInfoBillById($id);
        $info = \json_decode(\json_encode($info),true);

        if($info){
            $data = [];
            $data['info'] = $info;
            $data['messages'] = $request->session()->get('messages');
            $data['updateError'] = $request->session()->get('updateError');
            return view('admin.bill.editBill',$data);
        }else{
            abort(404);
        }
    }

    public function handleEditBill(validateEditBill $request,OrderCart $order)
    {
        $stt = $request->status;
        $stt = in_array($stt, ['0','1']) ? $stt : 0;

        $id = $request->id;
        $id = is_numeric($id) ? $id : '';
        $info = $order->getInfoBillById($id);
        $info = \json_decode(\json_encode($info),true);

        $dataUpdata = [
            'status' => $stt
        ];

        $update = $order->updateStatus($dataUpdata, $id);
        if($update){
            $request->session()->flash('updateSuccess','Duyệt đơn hàng thành công');
            return redirect()->route('admin.bill');
        }else{
            $request->session()->flash('updateError','Duyệt đơn hàng thất bại');
            return redirect()->route('admin.editBill');
        }
    }
}
