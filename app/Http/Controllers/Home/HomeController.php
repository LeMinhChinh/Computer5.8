<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Trademark;
use App\Models\Product;
use App\Models\DetailProduct;

class HomeController extends Controller
{
    public function home(Request $request, Category $cate, Trademark $trade, Product $product,DetailProduct $detail)
    {
        $data = [];
        $lstHotProduct = $detail->getAllDataByCreateAt();
        $lstHotProduct = json_decode(json_encode($lstHotProduct),true);
        // dd($lstHotProduct);

        $lstCate = $cate->getAllDataCate();
        $lstCate = json_decode(json_encode($lstCate),true);

        $lstName = $cate->getDataName();
        $lstName = json_decode(json_encode($lstName),true);

        $lstLaptop = $detail->getAllDataLaptop();
        $lstLaptop = json_decode(json_encode($lstLaptop),true);
        // dd($lstLaptop);
        $lstPC = $detail->getAllDataPC();
        $lstPC = json_decode(json_encode($lstPC),true);

        $data['lstHotProduct'] = $lstHotProduct;
        $data['lstCate'] = $lstCate;
        $data['lstName'] = $lstName;
        $data['lstLaptop'] = $lstLaptop;
        $data['lstPC'] = $lstPC;

        return view('home.home.page',$data);
    }

    public function errorpage()
    {
        return view('home.home.error');
    }

    public function navigation(Category $cate)
    {
        $data = [];

        $lstCate = $cate->getAllDataCate();
        $lstCate = json_decode(json_encode($lstCate),true);

        $lstName = $cate->getDataName();
        $lstName = json_decode(json_encode($lstName),true);

        $data['lstCate'] = $lstCate;
        $data['lstName'] = $lstName;
        return view('home.partials.nav',$data);
    }
}
