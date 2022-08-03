<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\AppMailer;
use Illuminate\Support\Facades\Auth;
use App\Models\ComplaintRegistration;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Guest Complaint Registration Save

    public function guestComplaintRegistration()
    {
        try {
            $getdata = \App\Models\ComplaintRegistration::latest()->first();
            // dd($checkdata);

            if (isset($getdata) && $getdata) {
                $incid = $getdata->id + 1;
                $num_padded = sprintf("%03d", $incid);
                $ticketID = "NOVITA ID-" . $num_padded;
                // dd($ticketID);

            } else {
                $incid = 1;
                $num_padded = sprintf("%03d", $incid);
                $ticketID = "NOVITA ID-" . $num_padded;
                // dd($ticketID);
            }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('guest.complainRegister', ['ticketID' => $ticketID]);
    }


    // Guest Complaint Registration Save

    public function guestComplaintRegistrationSave(Request $request, AppMailer $mailer)
    {
        dd($request->all());
        try {
            $picture = "";
            $imageNameArr = [];
            $this->validate($request, [
                'name'                 => 'required',
                'status'               => 'required',
                'email'                => 'required',
                'phone'                => 'required',
                'productSerialNo'      => 'required',
                'productPartNo'        => 'required',
                'purchaseDate'         => 'required',
                'warrantyCheck'        => 'required',
                'chanalPurchase'       => 'required',
                'city'                 => 'required',
                'state'                => 'required',
                'pinCode'              => 'required',
                'issue'                => 'required',
                'ticketID'             => 'required',
                'purchaseInvoice.*'    => 'required|mimes:doc,docx,jpg,jpeg,png,pdf,xlsx,xlx,ppt,pptx,csv,zip|max:2048',
            ]);

            if ($request->hasFile('purchaseInvoice')) {
                $picture = array();
                $imageNameArr = [];
                foreach ($request->purchaseInvoice as $file) {
                    // you can also use the original name
                    $image = $file->getClientOriginalName();
                    $imageNameArr[] = $image;
                    // Upload file to public path in images directory
                    $fileName = $file->move(date('d-m-Y') . '-Complaint-Registration', $image);
                    // Database operation
                    $array[] = $fileName;
                    $picture = implode(",", $array); //Image separated by comma
                    // dd($picture);
                }
            }

            if ($request->purchaseInvoice == NULL) {
                return redirect()->back()->with("error", "The purchase invoice field is required...!!!");
            }

            $productExist = \App\Models\product_number::where('product_number', $request->productPartNo)->first();

            if (!isset($productExist)) {
                return redirect()->back()->with("error", "Something is wrong in Product Number $request->productPartNo !!");
            }

            $allserialnumber = explode(',', $productExist['serial_number']);
            $resultant = false;
            foreach ($allserialnumber as $key => $data) {
                if ($data == $request->productSerialNo) {
                    $resultant = true;
                }
            }

            if ($resultant == true) {

                $complRegis = new ComplaintRegistration();
                $complRegis->name              = $request->name;
                $complRegis->email             = $request->email;
                $complRegis->phone             = $request->phone;
                $complRegis->status            = $request->status;
                $complRegis->productSerialNo   = $request->productSerialNo;
                $complRegis->productPartNo     = $request->productPartNo;
                $complRegis->purchaseDate      = $request->purchaseDate;
                $complRegis->warrantyCheck     = $request->warrantyCheck;
                $complRegis->chanalPurchase    = $request->chanalPurchase;
                $complRegis->city              = $request->city;
                $complRegis->state             = $request->state;
                $complRegis->pinCode           = $request->pinCode;
                $complRegis->issue             = $request->issue;
                $complRegis->purchaseInvoice   = $picture;
                $complRegis->ticketID          = $request->ticketID;

                $getdata = \App\Models\ComplaintRegistration::where('productSerialNo', $request->productSerialNo)->count();

                if ($getdata > 0) {
                    return redirect()->back()->with("error", "Product is Already Registered.");
                } else {
                    $result = $complRegis->save();
                }

                $get = \App\Models\ComplaintRegistration::latest()->first();

                $mailer->sendcomplaintRegistrationInformation(Auth::user(), $get);

                if ($result) {
                    return redirect()->back()->with("success", "Product is Registered Now !");
                }
            } else {
                return redirect()->back()->with("error", "Something is wrong Serial Number  $request->productSerialNo !!");
            }
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with("error", "Something is wrong...!");
        }
    }

    // public function index()
    // {
    //     return view('user.home');
    // }

    // public function adminHome()
    // {
    //     return view('admin.adminHome');
    // }

    // public function changePassword()
    // {
    //     return view('user.change-password');
    // }

    // public function profile()
    // {
    //     return view('user.profile');
    // }

    // public function myProduct()
    // {

    //     return view('user.my-product');
    // }

    // public function user()
    // {
    //     $user = User::all();
    //     return view('admin.user',['user'=>$user]);
    // }
}
