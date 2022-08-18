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
            'DATE',
            'PRIORITY CODE',
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
            'CHANNEL PURCHASE',
            'CITY',
            'STATE',
            'ADDRESS',
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
        return ComplaintRegistration::select("created_at","priority", "ticketID", "ticketOld", "status", "name", "email", "phone", "productSerialNo", "productPartNo", "purchaseDate", "warrantyCheck", "chanalPurchase", "city", "state", "address", "pinCode", "issue")->get();
    }
}
