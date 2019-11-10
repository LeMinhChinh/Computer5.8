<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Home\HomeController;
use App\Models\DetailProduct;

class SearchController extends HomeController
{
    public function search(Request $request, DetailProduct $detail)
    {
        $keyword = $request->search;
        $keyword = trim($keyword);
        $data = [];

        $dataSearch = $detail->getInfoSearch($keyword);
        $dataSearch = \json_decode(\json_encode($dataSearch),true);

        $data['search'] = $dataSearch;
        $data['keyword'] = $keyword;

        return view('home.search.search',$data);
    }
}
