<?php

namespace App\Imports;

use App\Models\Backend\Schedule\ECommerce;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportECommerce implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
      return new ECommerce([
        "col_1" => $row[0],
        "col_2" => $row[1],
        "col_3" => $row[2],
        "col_4" => $row[3],
        "col_5" => $row[4],
        "col_6" => $row[5],
      ]);
    }
}
