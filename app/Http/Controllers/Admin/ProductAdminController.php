<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Trademark;
use App\Models\TypeTrade;
use App\Models\DetailProduct;
use App\Models\Specification;
use App\Http\Requests\validateCreateProduct;
use App\Http\Requests\validateEditProduct;
use App\Http\Requests\validateEditDetail;
use Illuminate\Support\Facades\Validator;

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
        $data['updateProductSuccess'] = $request->session()->get('updateProductSuccess');

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
        // dd($lstLaptop);

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

    public function createProduct(Request $request,TypeTrade $typetrade, DetailProduct $detail,Specification $spec)
    {
        $data = [];
        $typetrade = $typetrade->getAllDataTT();
        $typetrade = \json_decode(\json_encode($typetrade),true);
        // dd($typetrade);
        $spec = $spec->getAllData();
        $spec = \json_decode(\json_encode($spec),true);

        $data['typetrade'] = $typetrade;
        $data['spec'] = $spec;
        $data['messages'] = $request->session()->get('messages');
        $data['createProductError'] = $request->session()->get('createProductError');
        $data['createDetailProductError'] = $request->session()->get('createDetailProductError');
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

        // if($request->hasFile('imgPr')){
        //     if($request->file('imgPr')->isValid()){
        //         $file = $request->file('imgPr');
        //         $nameFile = $file->getClientOriginalName();
        //         $up = $file->move('Uploads/images',$nameFile);

        //         if(!$up){
        //             $request->session()->flash('errImage','Lỗi upload ảnh lên server');
        //             return redirect()->route('admin.createProduct');
        //         }
        //     }
        // }

        if(isset($_FILES['imgPr'])){
            if($_FILES['imgPr']['error'] == 0){
                $nameFile = $_FILES['imgPr']['name'];
                $tmpName  = $_FILES['imgPr']['tmp_name'];
                $up = move_uploaded_file($tmpName, public_path() . '/Uploads/images/' . $nameFile);
                if(!$up){
                    $request->session()->flash('errorAvatar', 'Lỗi upload ảnh lên server');
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
            'status' => 1,
            'count_view' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];

        $idProduct = $product->insertProduct($insertData);
        if($idProduct > 0){
            $detailProduct = [
                'id_product' => $idProduct,
                'id_specification' => $spec,
                'description' => $desc,
                'quantity' => $quant
            ];
            $detailInsert = $detail->insertProductDetail($detailProduct);
            if($detailInsert){
                $request->session()->flash('createProductSuccess','Thêm mới sản phẩm thành công');
                return redirect()->route('admin.product');
            }else{
                $request->session()->flash('createDetailProductError','Thêm chi tiết sản phẩm thất bại.Vui lòng kiểm tra lại');
                return redirect()->route('admin.createProduct');
            }
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

    public function editProduct(Request $request,$id,Product $product,TypeTrade $typetrade, Specification $spec)
    {
        $id = is_numeric($id) ? $id : 0;
        $infoProduct = $product->getInfoProductById($id);

        if($infoProduct){
            $data = [];
            $type = $typetrade->getAllData();
            $type = \json_decode(json_encode($type),true);
            $spec = $spec->getAllData();
            $spec = \json_decode(json_encode($spec),true);

            $data['type'] = $type;
            $data['spec'] = $spec;
            $data['info'] = $infoProduct;
            $data['messages'] = $request->session()->get('messages');
            $data['errorAvatar'] = $request->session()->get('errorAvatar');
            $data['updateProductError'] = $request->session()->get('updateProductError');

            return view('admin.product.edit',$data);
        }else{
            about(404);
        }
    }

    public function handleEditProduct(validateEditProduct $request, Product $product, DetailProduct $detail)
    {
        $name = $request->namePr;
        $price = $request->pricePr;
        $percent = $request->percentPr;
        $type = $request->typePr;
        $spec = $request->specPr;
        $quant = $request->quantPr;
        $desc = $request->desPr;
        $stt = $request->sttPr;
        $stt =  in_array($stt, ['0','1']) ? $stt : 0;

        $idPr = $request->id;
        $idPr = is_numeric($idPr) ? $idPr : 0;
        $infoProduct = $product->getInfoProductById($idPr);

        $validator = Validator::make(
            ['namePr' => $name],
            ['namePr' => 'unique:product,name,'.$idPr],
            ['unique' => 'Sản phẩm đã tồn tại']
        );

        if ($validator->fails()) {
            return redirect()->route('admin.editProduct',['id' => $idPost])
                    ->withErrors($validator)
                    ->withInput();
        }else{
            $oldAvatar = $infoProduct['image'];
            if(isset($_FILES['imgPr'])){
                if($_FILES['imgPr']['error'] == 0){
                    $validatorAvatar = Validator::make(
                        ['imgPr' => $request->file('imgPr')],
                        ['imgPr' => 'required'],
                        [
                            'required' => 'vui long chon anh'
                        ]
                    );

                    if($validatorAvatar->fails()){
                        return redirect()->route('admin.editPost',['id' => $idPr])
                                        ->withErrors($validatorAvatar)
                                        ->withInput();
                    }else{
                        $oldAvatar = $_FILES['imgPr']['name'];
                        $tmpName  = $_FILES['imgPr']['tmp_name'];
                        $up = move_uploaded_file($tmpName, public_path() . '/Uploads/images/' . $oldAvatar);
                        if(!$up){
                            $request->session()->flash('errorAvatar', 'Lỗi upload ảnh lên server');
                            return redirect()->route('admin.editProduct');
                        }
                    }
                }
            }

            $dataUpdate = [
                'id_typetrade' => $type,
                'name' => $name,
                'price' => $price,
                'percent' => $percent,
                'promo_price' => $price - (($price*$percent)/100) ,
                'image' => $oldAvatar,
                'status' => $stt,
                'updated_at' => date('Y-m-d H:i:s')
            ];

            $update = $product->editProduct($dataUpdate, $idPr);
            if($update){
                $updateDetail = [
                    'quantity' => $quant,
                    'description' => $desc,
                    'id_specification' => $spec
                ];
                $updateDetail = $detail->updateDetailProductById($updateDetail, $idPr);

                $request->session()->flash('updateProductSuccess', 'Cập nhật sản phẩm thành công');
                return redirect()->route('admin.product');
            }else{
                $request->session()->flash('updateProductError', 'Cập nhật sản phẩm thất bại.Vui lòng kiểm tra lại');
                return redirect()->route('admin.editProduct',['id' => $idPost]);
            }
        }
    }

    public function editDetail(Request $request,$id,Product $product, Specification $spec)
    {
        $id = is_numeric($id) ? $id : 0;
        $infoDetail = $product->getInfoProductById($id);

        if($infoDetail){
            $data = [];
            $spec = $spec->getAllData();
            $spec = \json_decode(json_encode($spec),true);

            $data['spec'] = $spec;
            $data['info'] = $infoDetail;
            $data['messages'] = $request->session()->get('messages');

            return view('admin.product.editDetail',$data);
        }else{
            about(404);
        }
    }

    // public function handleEditDetail(validateEditDetail $request,Product $product, Specification $spec,  DetailProduct $detail)
    // {
    //     $name = $request->namePr;
    //     $spec = $request->specPr;

    //     $idPr = $request->id;
    //     $idPr = is_numeric($idPr) ? $idPr : 0;
    //     $infoProduct = $product->getInfoProductById($idPr);

    //     $dataUpdate = [
    //         'name' => $name,
    //         'updated_at' => date('Y-m-d H:i:s')
    //     ];

    //     $update = $product->editDetail($dataUpdate, $idPr);
    //     if($update){
    //         $updateDetail = [
    //             'quantity' => $quant,
    //             'description' => $desc,
    //             'id_specification' => $spec
    //         ];
    //     }
    // }
}
