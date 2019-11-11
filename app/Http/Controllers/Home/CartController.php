<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\DetailProduct;
use App\Models\OrderCart;
use App\Models\DetailOrderCart;
use Illuminate\Support\Facades\Session;
use Cart;
use DB;
use App\Http\Requests\validateCreateBill;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Validator;

class CartController extends HomeController
{
    public function addCart($id,$quant,Product $product,DetailProduct $detail)
    {
        $orderPr = $detail->addProductToCart($id);
        $orderPr = \json_decode(\json_encode($orderPr),true);
        if($orderPr['quantity'] >= 0){
            if(!empty(Session::get('idSession'))){
                $idUser = Session::get('idSession');
            }else{
                $idUser = -1;
            }
            $price = $orderPr['promo_price'] == 0 ?  $orderPr['price'] : $orderPr['promo_price'];
            Cart::session($idUser)
                ->add([
                    'id' => $orderPr['id'],
                    'name' => $orderPr['name'],
                    'quantity' => 1,
                    'price' => $price,
                    'attributes'=>[
                            'image'=> $orderPr['image'],
                            'ram' => $orderPr['ram'],
                            'cpu' => $orderPr['cpu'],
                            'color' => $orderPr['color']
                    ]
            ]);
            $data['carts'] = Cart::getContent();
            return redirect()->route('user.showCart');
        }else{
            return redirect()->route('user.home');
        }
    }

    public function showCart(Request $request)
    {
        if(!empty(Session::get('idSession'))){
            $idUser = Session::get('idSession');
        }else{
            $idUser = -1;
        }
       $data['carts'] = Cart::session($idUser)->getContent();
       $data['Total'] = Cart::session($idUser)->getTotal();
       $data['errorLogin'] = $request->session()->get('errorLogin');
       $data['errorTotal'] = $request->session()->get('errorTotal');
       return view('home.cart.showcart',$data);
    }

    public function deleteProduct($id)
    {
        if(!empty(Session::get('idSession'))){
            $idUser = Session::get('idSession');
        }else{
            $idUser = -1;
        }
        Cart::session($idUser)->remove($id);
        return redirect()->route('user.showCart');
    }

    public function deleteCart()
    {
        if(!empty(Session::get('idSession'))){
            $idUser = Session::get('idSession');
        }else{
            $idUser = -1;
        }
        Cart::clear();
        Cart::session($idUser)->clear();
        return redirect()->route('user.showCart');
    }

    public function updateCart(Request $request)
    {
        if(!empty(Session::get('idSession'))){
            $idUser = Session::get('idSession');
        }else{
            $idUser = -1;
        }

        $idPr = $request->id;
        $idPr = is_numeric($idPr) ? $idPr : 0;
        $qtyPr = $request->quantity;

        $update=Cart::session($idUser)
                    ->update($idPr, array(
                            'quantity' => array(
                            'relative' => false,
                            'value' => $qtyPr)
        ));
        if($update){
            echo "ok";
        }else{
            echo "err";
        }
    }

    public function orderCart(Request $request)
    {
        if(!empty(Session::get('idSession'))){
            $idUser = Session::get('idSession');

            $data['carts'] = Cart::session($idUser)->getContent();
            $data['Total'] = Cart::session($idUser)->getTotal();
            $data['messages'] = $request->session()->get('messages');
            $data['errorQuantity'] = $request->session()->get('errorQuantity');
            if($data['Total'] != 0){
                return view('home.cart.orderCart',$data);
            }else{
                $request->session()->flash('errorTotal', 'Mời bạn mua sản phẩm trước khi đặt hàng');
                return redirect()->route('user.showCart');
                }
        }else{
            $request->session()->flash('errorLogin', 'Bạn cần đăng nhập để đặt hàng');
            return redirect()->route('user.showCart');
        }
    }

    public function createBill(validateCreateBill $request,Product $product,DetailProduct $detail)
    {
        $idUser = Session::get('idSession');
        $carts = Cart::session($idUser)->getContent();
        $total = Cart::session($idUser)->getTotal();

        foreach ($carts as $cart) {
            $orderPr = $detail->addProductToCart($cart['id']);
            if($cart['quantity'] > $orderPr->quantity){
                $request->session()->flash('errorQuantity', 'Sản phẩm hiện không đủ số lượng.Vui lòng giảm số lượng');
                return redirect()->route('user.orderCart');
            }
        }

        $newBill = new OrderCart;
        $newBill->id_acc = $idUser;
        $newBill->total = $total;
        $newBill->fullname = $request->nameCt;
        $newBill->phone = $request->phoneCt;
        $newBill->email = $request->emailCt;
        $newBill->address = $request->addCt;
        $newBill->payment = $request->payCt;
        $newBill->status = 0;
        $newBill->note = $request->noteCt;

        $newBill->save();

        foreach ($carts as $cart) {
            $orderPr = $detail->addProductToCart($cart['id']);
            $detailBill = new DetailOrderCart;
            $detailBill->id_cart =  $newBill->id;
            $detailBill->id_detailproduct= $cart['id'];
            $detailBill->quantity=$cart['quantity'];
            $detailBill->price =$cart['price'];

            $detailBill->save();
            print_r($detail);

            $qty = $orderPr->quantity - $cart['quantity'];
            DB::table('detail_product AS dp')
                    ->select('dp.*','p.name','p.image','p.price','p.promo_price','s.ram','s.cpu','s.color','p.id AS id_product')
                    ->join('product AS p','p.id','=','dp.id_product')
                    ->join('specification AS s','s.id','=','dp.id_specification')
                    ->where('dp.id',$cart['id'])
                    ->update(['quantity' => $qty]);
            Cart::session(Session::get('idSession'))->remove($cart['id']);
        }
        $request->session()->flash('successOrder', 'Bạn vừa đặt hàng thành công.Vui lòng chờ duyệt');
        return redirect()->route('user.userpage');
    }
}
