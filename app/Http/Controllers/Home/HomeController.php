<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Trademark;
use App\Models\Product;

class HomeController extends Controller
{
    public function home(Request $request, Category $cate, Trademark $trade, Product $product)
    {
        $data = [];
        $lstHotProduct = $product->getAllDataByCreateAt();
        $lstHotProduct = json_decode(json_encode($lstHotProduct),true);

        $lstCate = $cate->getAllDataCate();
        $lstCate = json_decode(json_encode($lstCate),true);

        $lstName = $cate->getDataName();
        $lstName = json_decode(json_encode($lstName),true);

        $lstLaptop = $product->getAllDataLaptop();
        $lstLaptop = json_decode(json_encode($lstLaptop),true);
        // dd($lstLaptop);
        $lstPC = $product->getAllDataPC();
        $lstPC = json_decode(json_encode($lstPC),true);

        $data['lstHotProduct'] = $lstHotProduct;
        $data['lstCate'] = $lstCate;
        $data['lstName'] = $lstName;
        $data['lstLaptop'] = $lstLaptop;
        $data['lstPC'] = $lstPC;

        return view('home.home.page',$data);
    }
}
