<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product_modal;
use App\Models\bishoy_name;
use App\Models\prokashoni_name;

class catagoryController extends Controller
{
    // public function catagory(){
    //     return view('catagory');
    // }

    public function catagoryWithData($productCatagory){
        $result = product_modal::where('bookCatagory','=',$productCatagory)->get();
        $count = product_modal::where('bookCatagory','=',$productCatagory)->count();
        $getCatagoriesBook = bishoy_name::all();
        
        return view('catagory_bishoy',[
            'data'=>$productCatagory,
            'bookCatagory'=>$result,
            'count'=>$count,
            'bishoyName'=>$getCatagoriesBook
        ]);
    }

    
    public function prokashoniWithData($productProkashoni){
        $result = product_modal::where('bookProkashoni','=',$productProkashoni)->get();
        $count = product_modal::where('bookProkashoni','=',$productProkashoni)->count();
        $getProkashoniBook = prokashoni_name::all();
        
        return view('catagory_prokashoni',[
            'data'=>$productProkashoni,
            'bookProkashoni'=>$result,
            'count'=>$count,
            'prokashoniName'=>$getProkashoniBook
        ]);
    }
    public function catagory(){

        $bishoyName = bishoy_name::all();

        return view('catagory',[
            'bishoyName'=>$bishoyName
        ]);
    }


    public function itemJson(){
       return product_modal::all();
    }

    public function a(){
        return view('a');
    }
}
