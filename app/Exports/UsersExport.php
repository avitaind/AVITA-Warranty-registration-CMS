<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class UsersExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'S.NO',
            'Customer First Name',
            'Customer Last Name',
            'Phone',
            'Email',
            'Address',
            'Gender',
            'Postcode',
            'Country',
            'State',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return DB::table('users')->where('is_admin', 0)->get();
        return User::select("id", "name", "last_name", "phone", "email", "address", "gender", "postcode", "country", "state")->get();
    }
}
