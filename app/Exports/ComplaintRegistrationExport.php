<?php

namespace App\Exports;

use App\Models\ComplaintRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class ComplaintRegistrationExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'TICKET ID',
            'PREVIOUS COMPLAINT TICKET ID',
            'STATUS',
            'NAME',
            'EMAIL',
            'PHONE',
            'SERIAL NUMBER',
            'PART NUMBER',
            'PURCHASE DATE',
            'WARRANTY CHECK',
            'CHANAL PURCHASE',
            'CITY',
            'STATE',
            'PIN CODE',
            'ISSUE',
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return DB::table('users')->where('is_admin', 0)->get();
        return ComplaintRegistration::select("ticketID", "ticketOld", "status", "name", "email", "phone", "productSerialNo", "productPartNo", "purchaseDate", "warrantyCheck", "chanalPurchase", "city", "state", "pinCode", "issue")->get();
    }
}
