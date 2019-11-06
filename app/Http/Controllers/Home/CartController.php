<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Cart;

class CartController extends Controller
{
    public function addCart($id,$quant,Product $product)
    {
        $orderPr = $product->addProductToCart($id);
        // $orderPr = Product::find($id);
        if($orderPr->quantity >= 0){
            if(!empty(Session::get('idSession'))){
                $idUser = Session::get('idSession');
            }else{
                $idUser = -1;
            }
            // if(Auth::check()){
            //     $idUser = Auth::user()->id;
            //    }else{
            //         $idUser =-1;
            //    }
            $price = $orderPr->promo_price == 0 ?  $orderPr->price : $orderPr->promo_price;
            Cart::session($idUser)
                ->add([
                    'id' => $orderPr->id,
                    'name' => $orderPr->name,
                    'quantity' => 1,
                    'price' => $price,
                    'attributes'=>[
                            'image'=> $orderPr->image,
                            'ram' => $orderPr->ram,
                            'cpu' => $orderPr->cpu,
                            'color' => $orderPr->color,
                    ]
            ]);
            $data['carts'] = Cart::getContent();
            return redirect()->route('user.showCart');
        }else{
            return redirect()->route('user.home');
        }
    }

    public function showCart()
    {
        if(!empty(Session::get('idSession'))){
            $idUser = Session::get('idSession');
        }else{
            $idUser = -1;
        }
       $data['carts'] = Cart::session($idUser)->getContent();
       $data['Total'] = Cart::session($idUser)->getTotal();
       return view('home.cart.showcart',$data);
    }
}
