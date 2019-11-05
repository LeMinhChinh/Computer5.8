<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\validateCreateSpec;
use App\Models\Specification;

class SpecificationController extends Controller
{
    public function createSpec(Request $request)
    {
        $data = [];

        $data['messages'] = $request->session()->get('messages');
        $data['createSpecError'] = $request->session()->get('createSpecError');
        return view('admin.speci.create',$data);
    }

    public function handleCreateSpec(validateCreateSpec $request,Specification $spec)
    {
        $ram = $request->ramPr;
        $cpu = $request->cpuPr;
        $hdd = $request->hddPr;
        $color = $request->colorPr;
        $screen = $request->screenPr;
        $battery = $request->batteryPr;
        $os = $request->osPr;
        $size = $request->sizePr;
        $weight = $request->weightPr;

        $insertSpec = [
            'ram' => $ram,
            'cpu' => $cpu,
            'hard_drive' => $hdd,
            'color' => $color,
            'screen' => $screen,
            'battery' => $battery,
            'operating_system' => $os,
            'size' => $size,
            'weight' => $weight
        ];

        $dataInsert = $spec->insertDataSpec($insertSpec);
        // dd($dataInsert);
        if($dataInsert){
            $request->session()->flash('createSpecSuccess','Thêm thông số sản phẩm thành công');
            return redirect()->route('admin.createProduct');
        }else{
            $request->session()->flash('createSpecError','Thêm thông số sản phẩm thất bại.Vui lòng kiểm tra lại');
            return redirect()->route('admin.createSpec');
        }
    }
}
