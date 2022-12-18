<?php

namespace App\Imports;

use App\Models\bishoy_name;
use Maatwebsite\Excel\Concerns\ToModel;

class bishoyImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new bishoy_name([
            'bishoyName'=>$row[6]
        ]);
    }
}
