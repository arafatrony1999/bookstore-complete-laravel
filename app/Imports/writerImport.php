<?php

namespace App\Imports;

use App\Models\writer_name;
use Maatwebsite\Excel\Concerns\ToModel;

class writerImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new writer_name([
            'WriterName'=>$row[4]
        ]);
    }
}
