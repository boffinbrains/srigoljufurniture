<?php

namespace App\Imports;

use App\Models\Customer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Customer([
            'company' => $row['name'],
            'contact_person' => $row['person'],
            'mobile_number' => $row['mobile'],
            'phone_number' => $row['phone'],
            'email' => $row['email'],
            'address' => $row['address'],
            'contact_person_address' => $row['personal_address'],
            'birthday' => $row['birthday'],
            'anniversary' => $row['anniversary'],
            'profession' => $row['profession'],
        ]);
    }
}
