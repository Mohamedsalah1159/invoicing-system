<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Traits\GenralTraits;
use Illuminate\Http\Request;
use App\Models\Section;
use Illuminate\Support\Arr;


class productControllerApi extends Controller
{
    use GenralTraits;

    public function create(ProductRequest $request){
        $secArray = Section::select(['id'])->get()->toarray();
        $secArray= Arr::flatten($secArray);
        $secinput = $request->section_id;
        $check = in_array($secinput, $secArray);
        if($check != 1){
            return $this->returnError(422, 'sorry this section dosen\'t exists', 'data');
        }
        $product = Product::create([
            'product_name' => $request->Product_name,
            'description' => $request->description,
            'section_id' => $request->section_id
        ]);
        return $this->returnSuccess(200, 'User successfully create it' ,'data', $product);

    }
}
