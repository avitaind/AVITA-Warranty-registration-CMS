<?php

namespace App\Http\Controllers;

use App\Imports\SellerInStockImport;
use App\Models\product_number;
use App\Models\Sales;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
// use App\Exports\UsersExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class SellerController extends Controller
{
    // Seller Sales Count

    public function getAllMonths()
    {

        $month_array = array();
        $total_sales_dates = Sales::orderBy('created_at', 'ASC')->pluck('created_at');
        $total_sales_dates = json_decode($total_sales_dates);

        if (!empty($total_sales_dates)) {
            foreach ($total_sales_dates as $unformatted_date) {
                $date = new \DateTime($unformatted_date);
                $month_no = $date->format('m');
                $month_name = $date->format('M');
                $month_array[$month_no] = $month_name;
            }
        }
        return $month_array;
    }

    public function getMonthlyTotalSalesCount($month)
    {
        $monthly_total_sales_count = Sales::whereMonth('created_at', $month)->where('user_id', Auth::user()->id)->get()->count();
        return $monthly_total_sales_count;
    }

    public function getMonthlyTotalSalesData()
    {

        $monthly_total_sales_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if (!empty($month_array)) {
            foreach ($month_array as $month_no => $month_name) {
                $monthly_total_sales_count = $this->getMonthlyTotalSalesCount($month_no);
                array_push($monthly_total_sales_count_array, $monthly_total_sales_count);
                array_push($month_name_array, $month_name);
            }
        }

        $max_no = max($monthly_total_sales_count_array);
        $max = round(($max_no + 10 / 2) / 10) * 10;
        $monthly_total_sales_data_array = array(
            'months' => $month_name_array,
            'total_sales_count_data' => $monthly_total_sales_count_array,
            'max' => $max,
        );

        return $monthly_total_sales_data_array;
    }

    // IN Sales Total Count

    public function getMonthlyINSalesCount($month)
    {
        $monthly_in_sales_count = Sales::whereMonth('created_at', $month)->where('type', 'IN')->where('user_id', Auth::user()->id)->get()->count();
        return $monthly_in_sales_count;
    }

    public function getMonthlyINSalesData()
    {

        $monthly_in_sales_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if (!empty($month_array)) {
            foreach ($month_array as $month_no => $month_name) {
                $monthly_in_sales_count = $this->getMonthlyINSalesCount($month_no);
                array_push($monthly_in_sales_count_array, $monthly_in_sales_count);
                array_push($month_name_array, $month_name);
            }
        }

        $max_no = max($monthly_in_sales_count_array);
        $max = round(($max_no + 10 / 2) / 10) * 10;
        $monthly_total_sales_data_array = array(
            'months' => $month_name_array,
            'in_sales_count_data' => $monthly_in_sales_count_array,
            'max' => $max,
        );

        return $monthly_total_sales_data_array;
    }

    // IN Sales Total Count

    public function getMonthlyOUTSalesCount($month)
    {
        $monthly_out_sales_count = Sales::whereMonth('created_at', $month)->where('type', 'OUT')->where('user_id', Auth::user()->id)->get()->count();
        return $monthly_out_sales_count;
    }

    public function getMonthlyOUTSalesData()
    {

        $monthly_out_sales_count_array = array();
        $month_array = $this->getAllMonths();
        $month_name_array = array();
        if (!empty($month_array)) {
            foreach ($month_array as $month_no => $month_name) {
                $monthly_out_sales_count = $this->getMonthlyOUTSalesCount($month_no);
                array_push($monthly_out_sales_count_array, $monthly_out_sales_count);
                array_push($month_name_array, $month_name);
            }
        }

        $max_no = max($monthly_out_sales_count_array);
        $max = round(($max_no + 10 / 2) / 10) * 10;
        $monthly_total_sales_data_array = array(
            'months' => $month_name_array,
            'out_sales_count_data' => $monthly_out_sales_count_array,
            'max' => $max,
        );

        return $monthly_total_sales_data_array;
    }

    // Seller Dashboard

    public function sellerHome()
    {
        try {
            $sale = Sales::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
            // $sales = Sales::where('user_id', Auth::user()->id)->first();

            $totalcount = Sales::where('user_id', Auth::user()->id)->count();

            $incount = Sales::where('type', 'IN')->where('user_id', Auth::user()->id)->count();
            $outcount = Sales::where('type', 'OUT')->where('user_id', Auth::user()->id)->count();
            // $totalcount = $incount + $outcount;

            // dd($incount,$outcount,$totalcount);
            // dd($outcount);
            // $totalProductcount = Sales::where('serialNumber', $sales->productNumber)->count();
            // dd($totalProductcount);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        };
        return view('seller.sellerHome', ['totalcount' => $totalcount, 'incount' => $incount, 'outcount' => $outcount, 'sale' => $sale]);
    }

    // User Seller Page

    public function profile()
    {
        try {
            //code...
            // $user = User::get()->first();
            $user = User::where('id', Auth::user()->id)->get()->first();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('seller.profile', compact('user'));
    }

    // Seller Profile Save

    public function profilesave(Request $request)
    {
        try {
            // dd($request->all());

            $picture = "";
            $imageNameArr = [];

            $this->validate($request, [
                'last_name' => 'required',
                'phone' => 'required',
                'address' => 'required',
                'gender' => 'required',
                'postcode' => 'required',
                'country' => 'required',
                'state' => 'required',
                // 'pic'              => 'required',
            ]);

            if ($request->hasFile('pic')) {
                $picture = array();
                $imageNameArr = [];
                foreach ($request->pic as $file) {
                    // you can also use the original name
                    $image = $file->getClientOriginalName();
                    $imageNameArr[] = $image;
                    // Upload file to public path in images directory
                    $fileName = $file->move(date('d-m-Y') . '-User', $image);
                    // Database operation
                    $array[] = $fileName;
                    $picture = implode(",", $array); //Image separated by comma
                }
            }

            User::where('id', $request->user_id)->update([
                'last_name' => $request->last_name,
                "phone" => $request->phone,
                "address" => $request->address,
                "gender" => $request->gender,
                "postcode" => $request->postcode,
                "country" => $request->country,
                "state" => $request->state,
                "pic" => $picture,
            ]);

            return redirect()->back()->with("usersuccess", "User detail is updated !");
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with("error", "Something is wrong !");
        }
    }

    // Seller Password Change

    public function changePassword()
    {
        return view('seller.change-password');
    }

    // Seller Password Store

    public function changePasswordSave(Request $request)
    {
        //   dd($request->all());
        try {
            $this->validate($request, [
                'current_password' => 'required',
                'new_password' => 'required',
            ]);
            // dd($request->all());
            if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
                // The passwords matches
                return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
            }
            if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
                //Current password and new password are same
                return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
            }
            $validator = Validator::make($request->all(), [
                'current_password' => 'required',
                'new_password' => ['required|min:6'],
                #'confirm_password' => ['same:new_password'],
            ]);
            //Change Password
            $user = Auth::user();
            $user->password = bcrypt($request->get('new_password'));
            $user->save();
            return redirect()->back()->with("success", "Password changed successfully !");
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with("error", "Something is wrong !");
        }
    }

    // List In Sales Seller Details

    public function listInsales()
    {
        try {
            $insale = Sales::where('user_id', Auth::user()->id)->where('type', 'IN')->get();
            // dd($insale);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('seller.listINsales', ['insale' => $insale]);
    }

    //   List OUT Sales Seller Details

    public function listOutsales()
    {
        try {
            $outsale = Sales::where('user_id', Auth::user()->id)->where('type', 'OUT')->get();
            // dd($outsale);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('seller.listOUTsales', ['outsale' => $outsale]);
    }

    public function sales(Request $request)
    {
        try {
            $sale = Sales::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('seller.sales', ['sale' => $sale]);
    }

    // Seller InSales Details

    public function InSales(Request $request)
    {
        try {
            $user_id = Auth::user()->id;
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        // return view('seller.salesIn', ['user_id' => $user_id]);
        return view('seller.salesIn', ['user_id' => $user_id]);
    }

    // Seller InSales Details Save

    public function InSalesSave(Request $request)
    {
        try {
            // dd($request->all());
            $picture = "";
            $imageNameArr = [];
            $this->validate($request, [
                'user_id' => 'required',
                'productNumber' => 'required',
                'serialNumber' => 'required',
                'productConfiguration' => 'required',
                'color' => 'required',
                'screenSize' => 'required',
                'saleDate' => 'required',
                // 'purchaseInvoice'          => 'required',
                'purchaseInvoice.*' => 'mimes:png,jpg,jpeg,pdf|max:2048',
            ]);

            if ($request->hasFile('purchaseInvoice')) {
                $picture = array();
                $imageNameArr = [];
                foreach ($request->purchaseInvoice as $file) {
                    // you can also use the original name
                    $image = $file->getClientOriginalName();
                    $imageNameArr[] = $image;
                    // Upload file to public path in images directory
                    $fileName = $file->move(date('d-m-Y') . '-In-Sales', $image);
                    // Database operation
                    $array[] = $fileName;
                    $picture = implode(",", $array); //Image separated by comma
                    // dd($picture);
                }
            }

            // if ($request->hasFile('purchaseInvoice')) {
            //     $image = $request->file('purchaseInvoice');
            //     $name = $image->getClientOriginalName();
            //     $destinationPath = public_path(date('d-m-Y') . '-In-Sales');
            //     $image->move($destinationPath, $name);
            // }

            // $fileName = time().'.'.$request->purchaseInvoice->extension();

            // $picture = $request->purchaseInvoice->move(public_path('In-Sales'), $fileName);

            $productExist = \App\Models\product_number::where('product_number', $request->productNumber)->first();

            if (!isset($productExist)) {
                # code...
                return redirect()->back()->with("error", "Something is wrong in Product Number $request->productNumber !!");
            }

            $allserialnumber = explode(',', $productExist['serial_number']);
            $resultant = false;
            foreach ($allserialnumber as $key => $data) {
                // dd($data,$_REQUEST);
                if ($data == $request->serialNumber) {
                    $resultant = true;
                }
            }

            if ($resultant == true) {

                $inSales = new Sales;
                $inSales->user_id = $request->user_id;
                $inSales->productNumber = $request->productNumber;
                $inSales->serialNumber = $request->serialNumber;
                $inSales->productConfiguration = $request->productConfiguration;
                $inSales->color = $request->color;
                $inSales->screenSize = $request->screenSize;
                $inSales->saleDate = $request->saleDate;
                $inSales->purchaseInvoice = $picture;

                // dd($inSales);

                $getdata = \App\Models\Sales::where('serialNumber', $request->serialNumber)->count();
                // dd($getdata);

                if ($getdata > 0) {
                    # code...
                    return redirect()->back()->with("error", "Product is Already IN Stock.");
                } else {
                    # code...
                    // dd($result);
                    $result = $inSales->save();
                }
                if ($result) {
                    return redirect()->back()->with("success", "Product is Now IN Stock !");
                }
            } else {
                return redirect()->back()->with("error", "Something is wrong Serial Number  $request->serialNumber !!");
            }
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with("error", "Something is wrong !");
        }
    }

    // Seller OutSales Detailsl

    public function OutSales(Request $request)
    {
        try {
            $user_id = $request->user()->id;
            $productNumber = $request->product_number;
            $salesid = $request->sales_id;
            $fetchsalesdata = \App\Models\Sales::where('id', $salesid)->first();
            $serialNumber = $request->serial_number;
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }

        return view('seller.salesOut', ['user_id' => $user_id, 'productNumber' => $productNumber, 'serialNumber' => $serialNumber, 'fetchsalesdata' => $fetchsalesdata]);
    }

    // Seller OutSales Details Save

    public function OutSalesSave(Request $request)
    {
        try {
            $picture = "";
            $imageNameArr = [];
            $this->validate($request, [
                'productNumber' => 'required',
                'serialNumber' => 'required',
                'productConfiguration' => 'required',
                'color' => 'required',
                'screenSize' => 'required',
                'saleDate' => 'required',
                'purchaseInvoice.*' => 'required|mimes:png,jpg,jpeg,pdf|max:2048',
            ]);

            if ($request->hasFile('purchaseInvoice')) {
                $picture = array();
                $imageNameArr = [];
                foreach ($request->purchaseInvoice as $file) {
                    // you can also use the original name
                    $image = $file->getClientOriginalName();
                    $imageNameArr[] = $image;
                    // Upload file to public path in images directory
                    $fileName = $file->move(date('d-m-Y') . '-Out-Sales', $image);
                    // Database operation   l ,
                    $array[] = $fileName;
                    $picture = implode(",", $array); //Image separated by comma
                    // dd($picture);
                }
            }

            // if ($request->hasFile('purchaseInvoice')) {
            //     $image = $request->file('purchaseInvoice');
            //     $name = $image->getClientOriginalName();
            //     $destinationPath = public_path(date('d-m-Y') . '-Out-Sales');
            //     $picture = $image->move($destinationPath, $name);
            // }

            $result = \App\Models\Sales::where('id', $request->sales_id)->update(['type' => 'OUT', 'purchaseInvoice' => $picture]);

            if ($result == true) {
                return redirect()->back()->with("success", "Product is now Updated OUT Stock !");
            }
        } catch (ModelNotFoundException $exception) {
            return redirect()->back()->with("error", "Something is wrong !");
        }
    }

    // Import Stock

    public function importInSeller()
    {
        // dd(request()->file('file'));
        Excel::import(new SellerInStockImport, request()->file('file'));

        return redirect()->back()->with("success", "Import In Stock Data");
    }
}
