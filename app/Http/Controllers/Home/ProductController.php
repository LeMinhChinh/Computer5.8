<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailProduct;
use App\Models\Product;
use App\Models\Category;
use App\Models\Trademark;

class ProductController extends Controller
{
    public function detail($id,DetailProduct $dtproduct,Request $request, Product $product)
    {
        $detailPr = $dtproduct->getDataProductById($id);
        $detailPr = \json_decode(json_encode($detailPr),true);

        $data['detailPr'] = $detailPr;
        // dd($detailPr);

        return view('home.product.detail',$data);
    }

    public function listproduct($idtype, Product $product)
    {
        if($idtype == 1){
            $listlaptop = $product->getAllProductByIdType($idtype);
            $data['paginate'] = $listlaptop;
            $listlaptop = json_decode(json_encode($listlaptop),true);
            $data['listlaptop'] = $listlaptop['data'] ?? [];
            $laptop = Category::find($idtype);

            $data['laptop'] = $laptop;

            return view('home.product.listlaptop',$data);
        }{
            $listpc = $product->getAllProductByIdType($idtype);
            $data['paginate'] = $listpc;
            $listpc = json_decode(json_encode($listpc),true);
            $data['listpc'] = $listpc['data'] ?? [];

            $pc = Category::find($idtype);

            $data['pc'] = $pc;

            return view('home.product.listpc',$data);
        }
    }

    public function fiterproduct($idtype, $idtrade, Product $product, Category $cate, Trademark $trade)
    {
        if($idtype ==1){
            $listlpName = $product->getAllLaptopByTypeTrade($idtrade);
            $listlpName = \json_decode(\json_encode($listlpName),true);

            $laptopType = Category::find($idtype);
            $laptopTrade = Trademark::find($idtrade);

            $data['laptopType'] = $laptopType;
            $data['laptopTrade'] = $laptopTrade;
            $data['listlpName'] = $listlpName;

            return view('home.product.listlpname',$data);
        }elseif($idtype ==2){
            $listpcName = $product->getAllPCByTypeTrade($idtrade);
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
