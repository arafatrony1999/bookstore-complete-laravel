<?php

namespace App\Imports;

use App\Models\product_modal;
use Maatwebsite\Excel\Concerns\ToModel;

class NewProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new product_modal([
            'bookName'=>$row[1],
            'bookPrice'=>$row[2],
            'bookProkashoni'=>$row[3],
            'bookWriter'=>$row[4],
            'productImage'=>$row[5],
            'bookCatagory'=>$row[6],
            'ISBN'=>$row[7],
            'stockAvail'=>$row[8],
            'productEdition'=>$row[9],
            'productPublishYear'=>$row[10],
            'productPage'=>$row[11],
            'productCountry'=>$row[12],
            'productLanguage'=>$row[13],
            'productDescription'=>$row[14],
            'productItem'=>$row[15],
            'total-sale'=>$row[16]
        ]);
    }
}
