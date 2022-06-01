<?php

namespace App\Imports;

use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
use DB;
use Maatwebsite\Excel\Concerns\WithHeadingRow; //for heading name

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\Importable;

class UsersImport implements ToCollection,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        
        foreach ($rows as $row)
        {
            DB::table('users')->insert([
                "name"      => $row["name"],
                "email"     => $row["email"],
                "password"  => Hash::make('123456')
           ]);

        $getid=DB::table('users')->select('id')->orderBy('id','desc')->first();
        $id=$getid->id;

            DB::table('students')->insert([
                "user_id"      => $id,
                "roll_no"     => $row["roll_no"]
           ]);
        }

      
    }
}
