<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailProduct;
use App\Models\Product;
use App\Models\Category;
use App\Models\Trademark;
use App\Http\Controllers\Home\HomeController;

class ProductController extends HomeController
{
    public function detail($id,DetailProduct $detail)
    {
        $detailPr = $detail->getDataProductById($id);
        $detailPr = \json_decode(json_encode($detailPr),true);

        $data['detailPr'] = $detailPr;

        return view('home.product.detail',$data);
    }

    public function listproduct($idtype, DetailProduct $detail)
    {
        if($idtype == 1){
            $listlaptop = $detail->getAllProductByIdType($idtype);
            $data['paginate'] = $listlaptop;
            $listlaptop = json_decode(json_encode($listlaptop),true);
            $data['listlaptop'] = $listlaptop['data'] ?? [];
            $laptop = Category::find($idtype);

            $data['laptop'] = $laptop;

            return view('home.product.listlaptop',$data);
        }{
            $listpc = $detail->getAllProductByIdType($idtype);
            $data['paginate'] = $listpc;
            $listpc = json_decode(json_encode($listpc),true);
            $data['listpc'] = $listpc['data'] ?? [];

            $pc = Category::find($idtype);

            $data['pc'] = $pc;

            return view('home.product.listpc',$data);
        }
    }

    public function fiterproduct($idtype, $idtrade, Category $cate, Trademark $trade,DetailProduct $detail)
    {

        if($idtype ==1){
            $listlpName = $detail->getAllLaptopByTypeTrade($idtrade);
            $listlpName = \json_decode(\json_encode($listlpName),true);

            $laptopType = Category::find($idtype);
            $laptopTrade = Trademark::find($idtrade);

            $data['laptopType'] = $laptopType;
            $data['laptopTrade'] = $laptopTrade;
            $data['listlpName'] = $listlpName;

            return view('home.product.listlpname',$data);
        }elseif($idtype ==2){
            $listpcName = $detail->getAllPCByTypeTrade($idtrade);
            $listpcName = \json_decode(\json_encode($listpcName),true);

            $laptopType = Category::find($idtype);
            $laptopTrade = Trademark::find($idtrade);

            $data['laptopType'] = $laptopType;
            $data['laptopTrade'] = $laptopTrade;

            $data['listpcName'] = $listpcName;

            return view('home.product.listpcname',$data);
        }
    }
}
