<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DetailProduct;
use App\Models\Product;
use App\Models\Category;

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
        }elseif($idtype ==2){
            $listpc = $product->getAllProductByIdType($idtype);
            $data['paginate'] = $listpc;
            $listpc = json_decode(json_encode($listpc),true);
            $data['listpc'] = $listpc['data'] ?? [];

            $pc = Category::find($idtype);

            $data['pc'] = $pc;

            return view('home.product.listpc',$data);
        }

    }
}
