<?php

namespace App\Exports;

use App\Models\ComplaintRegistration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;

class DateFilterComplaintRegistrationExport implements FromCollection
{
    public function rules()
    {
        return [
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }

    public function collection()
    {

        if (request()->start_date || request()->end_date != NULL) {

            // dd(request()->all());

            // $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $start_date = Carbon::parse(request()->start_date)->toDateTimeString();
            $end_date = Carbon::parse(request()->end_date)->toDateTimeString();

            $url = 'https://support.avita-india.com/';

            $check = ComplaintRegistration::whereBetween('created_at', [$start_date, $end_date])->count();

            dd($check);

            $export_data =  ComplaintRegistration::select("created_at", "priority", "ticketID", "ticketOld", "status", "name", "email", "phone", "productSerialNo", "productPartNo", "purchaseDate", "warrantyCheck", "chanalPurchase", "city", "state", "address", "pinCode", "issue", "purchaseInvoice")->whereBetween('created_at', [$start_date, $end_date])->get();

            $data_array[] = array(
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
                'PURCHASE INVOICE'
            );

            foreach ($export_data as $data) {

                $data_array[] = array(
                    'created_at'        => $data->created_at,
                    'priority'          => $data->priority,
                    'ticketID'          => $data->ticketID,
                    'ticketOld'         => $data->ticketOld,
                    'status'            => $data->status,
                    'name'              => $data->name,
                    'email'             => $data->email,
                    'phone'             => $data->phone,
                    'productSerialNo'   => $data->productSerialNo,
                    'productPartNo'     => $data->productPartNo,
                    'purchaseDate'      => $data->purchaseDate,
                    'warrantyCheck'     => $data->warrantyCheck,
                    'chanalPurchase'    => $data->chanalPurchase,
                    'city'              => $data->city,
                    'state'             => $data->state,
                    'address'           => $data->address,
                    'pinCode'           => $data->pinCode,
                    'issue'             => $data->issue,
                    'purchaseInvoice'   => $url . $data->purchaseInvoice,
                );
            }
            // dd($data_array);
            return collect($data_array);
        } else {
            $url = 'https://support.avita-india.com/';

            $export_data =  ComplaintRegistration::select("created_at", "priority", "ticketID", "ticketOld", "status", "name", "email", "phone", "productSerialNo", "productPartNo", "purchaseDate", "warrantyCheck", "chanalPurchase", "city", "state", "address", "pinCode", "issue", "purchaseInvoice")->get();

            $data_array[] = array(
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
                'PURCHASE INVOICE'
            );

            foreach ($export_data as $data) {

                $data_array[] = array(
                    'created_at'        => $data->created_at,
                    'priority'          => $data->priority,
                    'ticketID'          => $data->ticketID,
                    'ticketOld'         => $data->ticketOld,
                    'status'            => $data->status,
                    'name'              => $data->name,
                    'email'             => $data->email,
                    'phone'             => $data->phone,
                    'productSerialNo'   => $data->productSerialNo,
                    'productPartNo'     => $data->productPartNo,
                    'purchaseDate'      => $data->purchaseDate,
                    'warrantyCheck'     => $data->warrantyCheck,
                    'chanalPurchase'    => $data->chanalPurchase,
                    'city'              => $data->city,
                    'state'             => $data->state,
                    'address'           => $data->address,
                    'pinCode'           => $data->pinCode,
                    'issue'             => $data->issue,
                    'purchaseInvoice'   => $url . $data->purchaseInvoice,
                );
            }
            // dd($data_array);
            return collect($data_array);
        }
    }
}
