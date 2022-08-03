<?php

namespace App\Http\Controllers;

use App\Models\ComplaintRegistration;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Validator;

class APIComplaintRegistrationController extends Controller
{
    // Get All && Search

    public function index(Request $request)
    {
        if (strlen($request->city) > 0) {
            //$result =APIServiceCenter::select('city', 'state', 'pin','address','opening_hour')->Where('city','like','%'. $request->city . '%')->get();
            $result = ComplaintRegistration::select(
                'ticketID',
                'name',
                'email',
                'phone',
                'productSerialNo',
                'productPartNo',
                'purchaseDate',
                'warrantyCheck',
                'chanalPurchase',
                'city',
                'state',
                'pinCode',
                'issue',
                'purchaseInvoice',
                'status'
            )->Where('city', $request->city)->get();
            // dd(count($result)==0);
            // dd($result=='NULL');
            if (count($result) == 0) {
                return ["result" => "No data found"];
            }
        }
        // else{
        //     $result = APIServiceCenter::get();
        // }
        elseif (strlen($request->state) > 0) {
            $result = ComplaintRegistration::select(
                'ticketID',
                'name',
                'email',
                'phone',
                'productSerialNo',
                'productPartNo',
                'purchaseDate',
                'warrantyCheck',
                'chanalPurchase',
                'city',
                'state',
                'pinCode',
                'issue',
                'purchaseInvoice',
                'status'
            )->Where('state', $request->state)->get();
            // $result =APIServiceCenter::Where('city','like','%'. $request->state . '%')->get();
            if (count($result) == 0) {
                return ["result" => "No data found"];
            }
        }
        // else{
        //     $result = APIServiceCenter::get();
        // }
        elseif (strlen($request->pinCode) > 0) {
            $result = ComplaintRegistration::select(
                'ticketID',
                'name',
                'email',
                'phone',
                'productSerialNo',
                'productPartNo',
                'purchaseDate',
                'warrantyCheck',
                'chanalPurchase',
                'city',
                'state',
                'pinCode',
                'issue',
                'purchaseInvoice',
                'status'
            )->Where('pinCode', $request->pinCode)->get();
            // $result =APIServiceCenter::Where('pin','like','%'. $request->pin . '%')->get();
            if (count($result) == 0) {
                return ["result" => "No data found"];
            }
        } elseif (strlen($request->productSerialNo) > 0) {
            $result = ComplaintRegistration::select(
                'ticketID',
                'name',
                'email',
                'phone',
                'productSerialNo',
                'productPartNo',
                'purchaseDate',
                'warrantyCheck',
                'chanalPurchase',
                'city',
                'state',
                'pinCode',
                'issue',
                'purchaseInvoice',
                'status'
            )->Where('productSerialNo', $request->productSerialNo)->get();
            if (count($result) == 0) {
                return ["result" => "No data found"];
            }
        } else {
            $result = ComplaintRegistration::get();
        }
        return $result;
    }



    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $picture = "";
            // $pic = "";
            $imageNameArr = [];
            $checkdata = ComplaintRegistration::latest()->first();
            // dd($checkdata);

            if (isset($checkdata) && $checkdata) {
                $incid = $checkdata->id + 1;
                $num_padded = sprintf("%03d", $incid);
                $ticketID = "NOVITA ID-" . $num_padded;
                // dd($ticketID);
            } else {
                $incid = 1;
                $num_padded = sprintf("%03d", $incid);
                $ticketID = "NOVITA ID-" . $num_padded;
                // dd($ticketID);
            }

            $rules = array(
                'name'                 => 'required',
                // 'status'               => 'required',
                'email'                => 'required|email|unique:users',
                'phone'                => 'required|numeric|min:10',
                'productSerialNo'      => 'required',
                'productPartNo'        => 'required',
                'purchaseDate'         => 'required',
                'warrantyCheck'        => 'required',
                'chanalPurchase'       => 'required',
                'city'                 => 'required',
                'state'                => 'required',
                'pinCode'              => 'required',
                'issue'                => 'required',
                // 'ticketID'             => 'required',
                // 'purchaseInvoice'      => 'required',
                'purchaseInvoice'      => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
            );

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return $validator->errors();
            } else {

                if ($request->hasFile('purchaseInvoice')) {
                    $picture = array();
                    $imageNameArr = [];
                    // foreach ($request->purchaseInvoice as $file) {
                        // you can also use the original name
                        $file = $request->purchaseInvoice;
                        $image = $file->getClientOriginalName();
                        $imageNameArr[] = $image;
                        // Upload file to public path in images directory
                        $fileName = $file->move(date('d-m-Y') . '-Complaint-Registration', $image);
                        // Database operation
                        $array[] = $fileName;
                        $picture = implode(",", $array); //Image separated by comma
                        // dd($picture);

                        // dd($picture);
                    // }
                }


                $productExist = \App\Models\product_number::where('product_number', $request->productPartNo)->first();

                if (!isset($productExist)) {
                    return ["result" => "Something is wrong in Product Number $request->productPartNo !!"];
                }

                $allserialnumber = explode(',', $productExist['serial_number']);
                $resultant = false;
                foreach ($allserialnumber as $key => $data) {
                    if ($data == $request->productSerialNo) {
                        $resultant = true;
                    }
                }

                if ($resultant == true) {
                    // dd($picture);


                    $complRegis                    = new ComplaintRegistration();
                    $complRegis->name              = $request->name;
                    $complRegis->email             = $request->email;
                    $complRegis->phone             = $request->phone;
                    // $complRegis->status            = $request->status;
                    $complRegis->status            = 'In Processing';
                    $complRegis->productSerialNo   = $request->productSerialNo;
                    $complRegis->productPartNo     = $request->productPartNo;
                    $complRegis->purchaseDate      = $request->purchaseDate;
                    $complRegis->warrantyCheck     = $request->warrantyCheck;
                    $complRegis->chanalPurchase    = $request->chanalPurchase;
                    $complRegis->city              = $request->city;
                    $complRegis->state             = $request->state;
                    $complRegis->pinCode           = $request->pinCode;
                    $complRegis->issue             = $request->issue;
                    // $complRegis->purchaseInvoice   = $pic;
                    $complRegis->purchaseInvoice   = $picture;
                    $complRegis->ticketID          = $ticketID;


                    if($request->purchaseInvoice == NULL)
                    {
                        return ["result" => "The purchase invoice field is required...!!!"];
                    }

                    // dd($complRegis);

                    $getdata = \App\Models\ComplaintRegistration::where('productSerialNo', $request->productSerialNo)->count();

                    if ($getdata > 0) {
                        return ["result" => "Complaint is Already Registered"];
                    } else {
                        $mailCheck = \App\Models\ComplaintRegistration::where('email', $request->email)->count();

                        if ($mailCheck > 0) {
                            return ["result" => "Mail ID is Already Take"];
                        }

                        $phoneCheck = \App\Models\ComplaintRegistration::where('phone', $request->phone)->count();

                        if ($phoneCheck > 0) {
                            return ["result" => "Phone No. is Already Take"];
                        }
                        $result = $complRegis->save();
                    }
                    if ($result) {
                        return ["result" => "Product is Registered Now Your complaint id : $ticketID is registered with us. We will update you shortly."];
                    }
                } else {
                    return ["result" => "Something is wrong Serial Number  $request->productSerialNo !!"];
                }
            }
        } catch (ModelNotFoundException $exception) {
            return ["result" => "Something is wrong...! "];
        }
    }
}
