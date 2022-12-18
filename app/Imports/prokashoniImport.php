<?php

namespace App\Imports;

use App\Models\prokashoni_name;
use Maatwebsite\Excel\Concerns\ToModel;

class prokashoniImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new prokashoni_name([
            'WriterName'=>$row[4]
        ]);
    }
}
