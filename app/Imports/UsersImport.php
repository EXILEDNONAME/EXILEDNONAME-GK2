<?php

namespace App\Imports;

use App\Models\Backend\Main\PK\PKParty;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class UsersImport implements ToModel, WithStartRow, WithCustomCsvSettings
{
  public function startRow(): int
  {
      return 2;
  }

  public function getCsvSettings(): array
    {
        return [
            'delimiter' => ','
        ];
    }

    public function model(array $row)
    {
      return new PKParty([
         'COL 1'     => $row[0],
         'COL 2'     => $row[1],
         'COL 3'     => $row[2],
         'COL 4'     => $row[3],
         'COL 5'     => $row[4],
         'COL 6'     => $row[5],
         'COL 7'     => $row[6],
         'COL 8'     => $row[7],
         'COL 9'     => $row[8],
         'COL 10'     => $row[9],
         'COL 11'     => $row[10],
         'COL 12'     => $row[11],
         'COL 13'     => $row[12],
         'COL 14'     => $row[13],
         'COL 15'     => $row[14],
         'COL 16'     => $row[15],
         'COL 17'     => $row[16],
         'COL 18'     => $row[17],
         'COL 19'     => $row[18],
         'COL 20'     => $row[19],
      ]);
    }
}
