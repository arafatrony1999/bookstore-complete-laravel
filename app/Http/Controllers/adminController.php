<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product_modal;
use App\Models\writer_name;
use App\Models\prokashoni_name;
use App\Models\bishoy_name;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;
use App\Imports\prokashoniImport;
use App\Imports\UsersImport;
use App\Imports\writerImport;
use App\Imports\bishoyImport;
use App\Models\orders;

class adminController extends Controller
{

    // product functions 

    function adminproduct(Request $request){
        $writer_name = writer_name::all();
        $prokashoni_name = prokashoni_name::all();
        $bishoy_name = bishoy_name::all();
        return view('adminproduct',[
            'writer_name'=>$writer_name,
            'prokashoni_name'=>$prokashoni_name,
            'bishoy_name'=>$bishoy_name,
            'writer_name_update'=>$writer_name,
            'prokashoni_name_update'=>$prokashoni_name,
            'bishoy_name_update'=>$bishoy_name
        ]);
    }

    // Catagory2 add new item function 
    function productAddNew(Request $request){

        $request->session()->forget('sessionproductName');

        $bookName = $request->input('bookName');
        $bookPrice = $request->input('bookPrice');
        $bookProkashoni = $request->input('bookProkashoni');
        $bookWriter = $request->input('bookWriter');
        $bookCatagory = $request->input('bookCatagory');
        $bookISBN = $request->input('bookISBN');
        $bookAvail = $request->input('bookAvail');
        $productEdition = $request->input('productEdition');
        $productPublishYear = $request->input('productPublishYear');
        $productPage = $request->input('productPage');
        $productCountry = $request->input('productCountry');
        $productLanguage = $request->input('productLanguage');
        $productDescription = $request->input('productDescription');
        $productItem = $request->input('productItem');


        $request->session()->put('sessionproductName',$bookName);

        // $result = DB::insert('INSERT INTO `product` (`bookName`,`bookPrice`,`bookProkashoni`,`bookWriter`,`bookCatagory`) VALUES (?,?,?,?,?)',[$bookName1,$bookPrice1,$bookProkashoni1,$bookWriter1,$bookCatagory1]);
        
        $result = product_modal::insert([
            'bookName'=>$bookName,
            'bookPrice'=>$bookPrice,
            'bookProkashoni'=>$bookProkashoni,
            'bookWriter'=>$bookWriter,
            'bookCatagory'=>$bookCatagory,
            'ISBN'=>$bookISBN,
            'stockAvail'=>$bookAvail,
            'productEdition'=>$productEdition,
            'productPublishYear'=>$productPublishYear,
            'productPage'=>$productPage,
            'productCountry'=>$productCountry,
            'productLanguage'=>$productLanguage,
            'productDescription'=>$productDescription,
            'productItem'=>$productItem
        ]);

        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }
    // Catagory2 add new item function 

    // Catagory2 add new IMAGE function 
    function productImageUrl(Request $request){
        $sessionproductName = $request->session()->get('sessionproductName');

        $imagePath = $request->file('photo')->store('public');
        $imageName = (explode('/',$imagePath))[1];
        $hostName = $_SERVER['HTTP_HOST'];
        $first = "http://";

        $finalImageName = $first.$hostName."/storage/app/public/".$imageName;

        $result = DB::table('product')
            ->where('bookName','=',$sessionproductName)
            ->update(['productImage'=>$finalImageName]);
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }
    // Catagory2 add new IMAGE function 

    function getproductData(){
        $result = product_modal::all();
        $result = json_encode($result);
        
        return $result;
    }

    function productDeleteURL(Request $request){
        $productDeleteID = $request->input('productDeleteIDget');

        $deleteSuccess = product_modal::where('id','=',$productDeleteID)->delete();

        if($deleteSuccess==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function productUpdateURL(Request $request){
        $updateID = $request->input('updateID');
        $result = product_modal::where('id','=',$updateID)->get();
        $result = json_encode($result);
        return $result;
    }

    function productFinalUpdateURL(Request $request){
        $request->session()->forget('productUpdateSessionID');

        $productUpdateID = $request->input('productUpdateID');

        $request->session()->put('productUpdateSessionID',$productUpdateID);


        $bookNameUpdate = $request->input('bookNameUpdate');
        $bookPriceUpdate = $request->input('bookPriceUpdate');
        $bookProkashoniUpdate = $request->input('bookProkashoniUpdate');
        $bookWriterUpdate = $request->input('bookWriterUpdate');
        $bookCatagoryUpdate = $request->input('bookCatagoryUpdate');

        $productEditionUpdate = $request->input('productEditionUpdate');
        $productPublishYearUpdate = $request->input('productPublishYearUpdate');
        $productPageUpdate = $request->input('productPageUpdate');
        $productCountryUpdate = $request->input('productCountryUpdate');
        $productLanguageUpdate = $request->input('productLanguageUpdate');
        $productDescriptionUpdate = $request->input('productDescriptionUpdate');
        $productItemUpdate = $request->input('productItemUpdate');


        $result = product_modal::where('id',$productUpdateID)->update([
            'bookName'=>$bookNameUpdate,
            'bookPrice'=>$bookPriceUpdate,
            'bookProkashoni'=>$bookProkashoniUpdate,
            'bookWriter'=>$bookWriterUpdate,
            'bookCatagory'=>$bookCatagoryUpdate,
            'productEdition'=>$productEditionUpdate,
            'productPublishYear'=>$productPublishYearUpdate,
            'productPage'=>$productPageUpdate,
            'productCountry'=>$productCountryUpdate,
            'productLanguage'=>$productLanguageUpdate,
            'productDescription'=>$productDescriptionUpdate,
            'productItem'=>$productItemUpdate

        ]);

        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function productImageFinalUpdateURL(Request $request){
        $productImageUpdateID = $request->session()->get('productUpdateSessionID');

        $imagePath = $request->file('photoUpdate')->store('public');
        $imageName = (explode('/',$imagePath))[1];
        $hostName = $_SERVER['HTTP_HOST'];
        $first = "http://";

        $finalImageName = $first.$hostName."/storage/app/public/".$imageName;

        
        DB::table('product')
            ->where('id','=',$productImageUpdateID)
            ->update(['productImage'=> $finalImageName]);

    }













    // Add new writer name 
    function writers(){
        return view('writers');
    }


    function writerNameAddNew(Request $request){
        $writerName = $request->input('writerName');
        
        // $result = DB::insert('INSERT INTO `writers` (`WriterName`) VALUES (?)',[$writerName]);

        $result = writer_name::insertOrIgnore([
            'WriterName'=>$writerName
        ]);

        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    
    function writerNameData(){
        $result = writer_name::all();
        $result = json_encode($result);
        
        return $result;
    }

    function writerUpdateURL(Request $request){
        $writerUpdateID = $request->input('writerUpdateID');
        $result = writer_name::where('writerID','=',$writerUpdateID)->get();
        return $result;
    }
    function writerUpdateURLsend(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');

        $result = writer_name::where('writerID','=',$id)
        ->update(['writerName'=> $name]);

        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function writerDeleteURL(Request $request){
        $id = $request->input('id');
        $result = writer_name::where('writerID','=',$id)->delete();
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function prokashoni(){
        return view('prokashoni');
    }

    function prokashoniNameAddNew(Request $request){
        $prokashoniName = $request->input('prokashoniName');
        
        // $result = DB::insert('INSERT INTO `writers` (`WriterName`) VALUES (?)',[$writerName]);

        $result = prokashoni_name::insertOrIgnore([
            'ProkashoniName'=>$prokashoniName
        ]);

        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    
    function prokashoniNameData(){
        $result = prokashoni_name::all();
        $result = json_encode($result);
        
        return $result;
    }

    function prokashoniUpdateURL(Request $request){
        $prokashoniUpdateID = $request->input('prokashoniUpdateID');
        $result = prokashoni_name::where('prokashoniID','=',$prokashoniUpdateID)->get();
        return $result;
    }
    function prokashoniUpdateURLsend(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');

        $result = prokashoni_name::where('prokashoniID','=',$id)
        ->update(['prokashoniName'=> $name]);

        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function prokashoniDeleteURL(Request $request){
        $id = $request->input('id');
        $result = prokashoni_name::where('prokashoniID','=',$id)->delete();
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }



    
    function bishoy(){
        return view('bishoy');
    }

    function bishoyNameAddNew(Request $request){
        $bishoyName = $request->input('bishoyName');
        
        // $result = DB::insert('INSERT INTO `writers` (`WriterName`) VALUES (?)',[$writerName]);

        $result = bishoy_name::insertOrIgnore([
            'bishoyName'=>$bishoyName
        ]);

        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    
    function bishoyNameData(){
        $result = bishoy_name::all();
        $result = json_encode($result);
        
        return $result;
    }

    function bishoyUpdateURL(Request $request){
        $bishoyUpdateID = $request->input('bishoyUpdateID');
        $result = bishoy_name::where('bishoyID','=',$bishoyUpdateID)->get();
        return $result;
    }
    function bishoyUpdateURLsend(Request $request){
        $id = $request->input('id');
        $name = $request->input('name');

        $result = bishoy_name::where('bishoyID','=',$id)
        ->update(['bishoyName'=> $name]);

        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }

    function bishoyDeleteURL(Request $request){
        $id = $request->input('id');
        $result = bishoy_name::where('bishoyID','=',$id)->delete();
        if($result==true){
            return 1;
        }
        else{
            return 0;
        }
    }


    public function importPage(){
        return view('importPage');
    }


    public function adminOrders(){
        return view('adminOrders');
    }

    public function getorderData(Request $request){
        $result = orders::all();


        $result = json_encode($result);
        return $result;
    }

    public function orderUpdate(Request $request){
        $orderId = $request->input('orderId');
        $status = $request->input('status');

        $count = orders::where('orderID','=',$orderId)->where('status','=',$status)->count();

        if($count==0){
            $result = orders::where('orderID','=',$orderId)
            ->update(['status'=>$status]);
            if($result==true){
                return 1;
            }
            else{
                return 0;
            }
        }
        else{
            return 0;
        }
    }
    
    public function export(){
        return Excel::download(new UsersExport(),'product.xlsx');
    }

    
    public function import(Request $request){
        if($request->hasFile('file')){
            $path = $request->file('file');
            $data = Excel::toCollection(new UsersImport(), $path);

            foreach($data[0] as $data){
                $result = product_modal::insertOrIgnore([
                    'bookName'=>$data[1],
                    'bookPrice'=>$data[2],
                    'bookProkashoni'=>$data[3],
                    'bookWriter'=>$data[4],
                    'productImage'=>$data[5],
                    'bookCatagory'=>$data[6],
                    'ISBN'=>$data[7],
                    'stockAvail'=>$data[8],
                    'productEdition'=>$data[9],
                    'productPublishYear'=>$data[10],
                    'productPage'=>$data[11],
                    'productCountry'=>$data[12],
                    'productLanguage'=>$data[13],
                    'productDescription'=>$data[14],
                    'productItem'=>$data[15],
                    'total-sale'=>$data[16]
                ]);
            }

            $data_prokashoni = Excel::toCollection(new prokashoniImport(), $path);
            foreach($data_prokashoni[0] as $data_prokashoni){
                prokashoni_name::insertOrIgnore([
                    'ProkashoniName'=>$data_prokashoni[3]
                ]);
            }

            $data_writer = Excel::toCollection(new writerImport(), $path);
            foreach($data_writer[0] as $data_writer){
                writer_name::insertOrIgnore([
                    'WriterName'=>$data_writer[4]
                ]);
            }

            $data_bishoy = Excel::toCollection(new bishoyImport(), $path);
            foreach($data_bishoy[0] as $data_bishoy){
                bishoy_name::insertOrIgnore([
                    'bishoyName'=>$data_bishoy[6]
                ]);
            }

            if($result==true){
                return redirect('adminProduct')->with('success-update','Products updated successfull');
            }
            else{
                return redirect('adminProduct')->with('success-update','Products updated failed');
            }
        }
    }

    // public function importExcel(Request $request){
    //     if($request->hasFile('file')){
    //         $path = $request->file('file');
    //         $data = Excel::toCollection(new UsersImport(), $path);

    //         foreach($data[0] as $data){
    //             $result = product_modal::where('id','=',$data[0])->update([
    //                 'bookName'=>$data[1],
    //                 'bookPrice'=>$data[2],
    //                 'bookProkashoni'=>$data[3],
    //                 'bookWriter'=>$data[4],
    //                 'productImage'=>$data[5],
    //                 'bookCatagory'=>$data[6],
    //                 'ISBN'=>$data[7],
    //                 'stockAvail'=>$data[8],
    //                 'productEdition'=>$data[9],
    //                 'productPublishYear'=>$data[10],
    //                 'productPage'=>$data[11],
    //                 'productCountry'=>$data[12],
    //                 'productLanguage'=>$data[13],
    //                 'productDescription'=>$data[14],
    //                 'productItem'=>$data[15],
    //                 'total-sale'=>$data[16]
    //             ]);
    //         }
    //     }
    // }

    public function prokashoniImport(Request $request){
        if($request->hasFile('prokashoniFile')){
            $path = $request->file('prokashoniFile');
            $data = Excel::toCollection(new prokashoniImport(), $path);

            foreach($data[0] as $data){
                $result = prokashoni_name::insertOrIgnore([
                    'ProkashoniName'=>$data[3]
                ]);
            }
            if($result==true){
                return 1;
            }
            else{
                return 0;
            }
        }
    }

    
    public function writerImport(Request $request){
        if($request->hasFile('writerFile')){
            $path = $request->file('writerFile');
            $data = Excel::toCollection(new writerImport(), $path);

            foreach($data[0] as $data){
                $result = writer_name::insertOrIgnore([
                    'WriterName'=>$data[4]
                ]);
            }
            if($result==true){
                return 1;
            }
            else{
                return 0;
            }
        }
    }

    public function bishoyImport(Request $request){
        if($request->hasFile('bishoyFile')){
            $path = $request->file('bishoyFile');
            $data = Excel::toCollection(new bishoyImport(), $path);

            foreach($data[0] as $data){
                $result = bishoy_name::insertOrIgnore([
                    'bishoyName'=>$data[6]
                ]);
            }
            if($result==true){
                return 1;
            }
            else{
                return 0;
            }
        }
    }


    public function adminImages(){
        return view('adminImages');
    }

    public function adminImageUpload(Request $request){
        $imageName = $request->file('adminImageUpload')->store('public');
        dd($imageName);
    }


}
