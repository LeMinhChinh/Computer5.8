<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Trademark;
use App\Models\TypeTrade;
use App\Models\DetailProduct;
use App\Http\Requests\validateCreateProduct;

class ProductAdminController extends Controller
{
    public function product(Product $product,Request $request)
    {
        $data = [];
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $data['keyword'] = $keyword;

        $lstProduct = $product->getAllData($keyword);

        $data['paginate'] = $lstProduct;
        $lstProduct = \json_decode(json_encode($lstProduct),true);

        $data['lstProduct'] = $lstProduct['data'] ?? [];
        $data['createProductSuccess'] = $request->session()->get('createProductSuccess');

        return view('admin.product.product',$data);
    }

    public function listLaptop(Product $laptop,Request $request)
    {
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $data['keyword'] = $keyword;

        $lstLaptop = $laptop->getAllLaptopAdmin($keyword);
        $data['paginate'] = $lstLaptop;
        $lstLaptop = \json_decode(json_encode($lstLaptop),true);

        $data['lstLaptop'] = $lstLaptop['data'] ?? [];

        return view('admin.product.laptop',$data);
    }

    public function listpc(Product $pc,Request $request)
    {
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $data['keyword'] = $keyword;

        $lstPc = $pc->getAllPcAdmin($keyword);
        $data['paginate'] = $lstPc;
        $lstPc = \json_decode(json_encode($lstPc),true);

        $data['lstPc'] = $lstPc['data'] ?? [];

        return view('admin.product.pc',$data);
    }

    public function createProduct(Request $request,TypeTrade $typetrade, DetailProduct $detail)
    {
        $data = [];
        $typetrade = $typetrade->getAllData();
        $typetrade = \json_decode(\json_encode($typetrade),true);
        // $spec = $detail->getAllData();
        // $spec = \json_decode(\json_encode($spec),true);

        $data['typetrade'] = $typetrade;
        // $data['spec'] = $spec;
        $data['messages'] = $request->session()->get('messages');
        $data['createProductError'] = $request->session()->get('createProductError');
        $data['errImage'] = $request->session()->get('errImage');
        return view('admin.product.create',$data);
    }

    public function handleCreateProduct(validateCreateProduct $request, Product $product,DetailProduct $detail)
    {
        $name = $request->namePr;
        $price = $request->pricePr;
        $percent = $request->percentPr;
        $promoPr = $request->promoPr;
        $typetrade = $request->typePr;
        $spec = $request->specPr;
        $quant = $request->quantPr;
        $desc = $request->desPr;

        if($request->hasFile('imgPr')){
            if($request->file('imgPr')->isValid()){
                $file = $request->file('imgPr');
                $nameFile = $file->getClientOriginalName();
                $up = $file->move('Uploads/images',$nameFile);

                if(!$up){
                    $request->session()->flash('errImage','Lỗi upload ảnh lên server');
                    return redirect()->route('admin.createProduct');
                }
            }
        }
        $insertData = [
            'id_typetrade' => $typetrade,
            'name' => $name,
            'price' => $price,
            'percent' => $percent,
            'promo_price' => $price - (($price*$percent)/100) ,
            'image' => $nameFile,
            'status' => 0,
            'count_view' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];
        // dd($insertData);
        $idProduct = $product->insertProduct($insertData);
        if($idProduct > 0){
            // $detailProduct = [
            //     'id_product' => $idProduct,
            //     'id_specification' => $spec,
            //     'description' => $desc,
            //     'quantyti' => $quant
            // ];

            // $detailInsert = $detail->insertProductDetail();
            $request->session()->flash('createProductSuccess','Thêm mới sản phẩm thành công');
            return redirect()->route('admin.product');
        }else{
            $request->session()->flash('createProductError','Thêm mới thất bại.Vui lòng kiểm tra lại');
            return redirect()->route('admin.createProduct');
        }
    }

    public function deleteProduct(Request $request, Product $product)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if($id > 0){
            $delete = $product->deleteProduct($id);
            if($delete){
                echo "Success";
            } else {
                echo "Fail";
            }
        } else {
            echo "Error";
        }
    }
}
