<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Illuminate\Support\Facades\Hash;

class UsersImport implements ToModel, WithStartRow, WithCustomCsvSettings
{
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            // 'delimiter' => '';
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         dd($row);
    //   $row1= explode(",",$row[0]);
    //   print_r($row);
    //      exit;
        return new User([
            "firstname" => $row[1],
            "lastname" => $row[2],
            "username" => $row[3],
            "email" => $row[4],
            "password" => Hash::make($row[5])
        ]);
    }

} 