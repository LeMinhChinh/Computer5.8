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
use App\Http\Requests\validateCreateDetail;
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

    public function listLaptop(DetailProduct $detail,Request $request)
    {
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $data['keyword'] = $keyword;

        $lstLaptop = $detail->getAllLaptopAdmin($keyword);
        $data['paginate'] = $lstLaptop;
        $lstLaptop = \json_decode(json_encode($lstLaptop),true);

        $data['lstLaptop'] = $lstLaptop['data'] ?? [];
        $data['updateSuccess'] = $request->session()->get('updateSuccess');
        $data['insertSuccess'] = $request->session()->get('insertSuccess');

        return view('admin.product.laptop',$data);
    }

    public function listpc(DetailProduct $detail,Request $request)
    {
        $keyword = $request->keyword;
        $keyword = \strip_tags($keyword);
        $data['keyword'] = $keyword;

        $lstPc = $detail->getAllPcAdmin($keyword);
        $data['paginate'] = $lstPc;
        $lstPc = \json_decode(json_encode($lstPc),true);

        $data['lstPc'] = $lstPc['data'] ?? [];
        $data['updateSuccess'] = $request->session()->get('updateSuccess');
        $data['insertSuccess'] = $request->session()->get('insertSuccess');

        return view('admin.product.pc',$data);
    }

    public function createProduct(Request $request,TypeTrade $typetrade)
    {
        $data = [];
        $typetrade = $typetrade->getAllDataTT();
        $typetrade = \json_decode(\json_encode($typetrade),true);

        $data['typetrade'] = $typetrade;
        $data['messages'] = $request->session()->get('messages');
        $data['createProductError'] = $request->session()->get('createProductError');
        $data['errImage'] = $request->session()->get('errImage');
        return view('admin.product.create',$data);
    }

    public function handleCreateProduct(validateCreateProduct $request, Product $product)
    {
        $name = $request->namePr;
        $price = $request->pricePr;
        $percent = $request->percentPr;
        $promoPr = $request->promoPr;
        $typetrade = $request->typePr;

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

    public function deleteDetail(Request $request, DetailProduct $detail)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        if($id > 0){
            $delete = $detail->deleteDetail($id);
            if($delete){
                echo "Success";
            } else {
                echo "Fail";
            }
        } else {
            echo "Error";
        }
    }

    public function editProduct(Request $request,$id,Product $product,TypeTrade $typetrade)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        $infoProduct = $product->getInfoProductById($id);

        if($infoProduct){
            $data = [];
            $type = $typetrade->getAllData();
            $type = \json_decode(json_encode($type),true);

            $data['type'] = $type;
            $data['info'] = $infoProduct;
            $data['messages'] = $request->session()->get('messages');
            $data['errorAvatar'] = $request->session()->get('errorAvatar');
            $data['updateProductError'] = $request->session()->get('updateProductError');

            return view('admin.product.edit',$data);
        }else{
            abort(404);
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
                            'required' => 'Vui lòng chọn ảnh'
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
                $request->session()->flash('updateProductSuccess', 'Cập nhật sản phẩm thành công');
                return redirect()->route('admin.product');
            }else{
                $request->session()->flash('updateProductError', 'Cập nhật sản phẩm thất bại.Vui lòng kiểm tra lại');
                return redirect()->route('admin.editProduct',['id' => $idPost]);
            }
        }
    }

    public function createDetail(Request $request, Product $product, Specification $spec)
    {
        $data = [];

        $name = $product->getName();
        $name = \json_decode(\json_encode($name),true);

        $spec = $spec->getAllData();
        $spec = \json_decode(\json_encode($spec),true);

        $data['spec'] = $spec;
        $data['namePr'] = $name;
        $data['messages'] = $request->session()->get('messages');
        $data['insertError'] = $request->session()->get('insertError');
        $data['createSpecSuccess'] = $request->session()->get('createSpecSuccess');

        return view('admin.product.createdetail',$data);
    }

    public function createDetail_v2(Request $request, Product $product, Specification $spec)
    {
        $data = [];

        $name = $product->getName();
        $name = \json_decode(\json_encode($name),true);

        $spec = $spec->getAllData();
        $spec = \json_decode(\json_encode($spec),true);

        $data['spec'] = $spec;
        $data['namePr'] = $name;
        $data['messages'] = $request->session()->get('messages');
        $data['insertError'] = $request->session()->get('insertError');
        // $data['createSpecSuccess'] = $request->session()->get('createSpecSuccess');

        return view('admin.product.createdetail_v2',$data);
    }

    public function handleCreateDetail(validateCreateDetail $request, DetailProduct $detail)
    {
        $name = $request->namePr;
        $spec = $request->specPr;
        $qty = $request->qtyPr;
        $desc = $request->desPr;

        $insertData = [
            'id_product' => $name,
            'id_specification' => $spec,
            'quantity' => $qty,
            'description' => $desc,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];

        $insert = $detail->insertProductDetail($insertData);
        if($insert){
            $request->session()->flash('insertSuccess','Thêm mới sản phẩm thành công');
            return redirect()->route('admin.listLaptop');
        }else{
            $request->session()->flash('insertError','Thêm mới sản phẩm thất bại. Vui lòng kiểm tra lại');
            return redirect()->route('admin.createDetail');
        }
    }

    public function handleCreateDetail_v2(validateCreateDetail $request, DetailProduct $detail)
    {
        $name = $request->namePr;
        $spec = $request->specPr;
        $qty = $request->qtyPr;
        $desc = $request->desPr;

        $insertData = [
            'id_product' => $name,
            'id_specification' => $spec,
            'quantity' => $qty,
            'description' => $desc,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => null
        ];

        $insert = $detail->insertProductDetail($insertData);
        if($insert){
            $request->session()->flash('insertSuccess','Thêm mới sản phẩm thành công');
            return redirect()->route('admin.listpc');
        }else{
            $request->session()->flash('insertError','Thêm mới sản phẩm thất bại. Vui lòng kiểm tra lại');
            return redirect()->route('admin.createDetail');
        }
    }

    public function editDetailPr(Request $request,$id,DetailProduct $detail,Specification $spec)
    {
        $id = $request->id;
        $id = is_numeric($id) ? $id : 0;
        $infoDetail = $detail->getInfoDetailById($id);
        $infoDetail = \json_decode(\json_encode($infoDetail),true);

        $spec = $spec->getAllData();
        $spec = \json_decode(json_encode($spec),true);

        if($infoDetail){
            $data = [];
            $data['info'] = $infoDetail;
            $data['spec'] = $spec;
            $data['messages'] = $request->session()->get('messages');
            $data['updateError'] = $request->session()->get('updateError');

            return view('admin.product.editDetail',$data);
        }else{
            abort(404);
        }
    }

    public function handleEditDetail(validateEditDetail $request, DetailProduct $detail, Specification $spec)
    {
        $spec = $request->specPr;
        $qty = $request->qtyPr;
        $desc = $request->desPr;

        $idDt = $request->id;
        $idDt = is_numeric($idDt) ? $idDt : 0;
        $infoDetail = $detail->getInfoDetailById($idDt);
        $infoDetail = \json_decode(\json_encode($infoDetail),true);

        $dataUpdate = [
            'id_specification' => $spec,
            'description' => $desc,
            'quantity' => $qty,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        $updateDt = $detail->updateDetailProductById($dataUpdate,$idDt);
        if($updateDt){
            $request->session()->flash('updateSuccess','Cập nhật sản phẩm thành công');
            if($infoDetail['id_type'] == 1){
                return redirect()->route('admin.listLaptop');
            }elseif($infoDetail['id_type'] == 2){
                return redirect()->route('admin.listpc');
            }
        }else{
            $request->session()->flash('updateError','Cập nhật sản phẩm thất bại');
            return redirect()->route('admin.editDetail');
        }
    }
}
