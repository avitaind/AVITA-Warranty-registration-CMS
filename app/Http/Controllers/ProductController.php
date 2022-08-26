<?php

namespace App\Http\Controllers;

use App\Exports\ExportAllProduct;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Product;
use App\Models\product_type;
use App\Models\product_model;
use App\Models\product_number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;


class ProductController extends Controller
{
    // All Products

    public function index()
    {
        try {
            // $product = DB::table('products')->where('product_types_id',$product_types_id)->get();
            $product = DB::table('products')->join('product_types', 'product_types.id', '=', 'products.product_types_id')
                ->join('product_models', 'product_models.products_id', '=', 'products.id')
                ->join('product_numbers', 'product_numbers.product_model_id', '=', 'product_models.id')
                ->select('product_types.name as type_name', 'products.name', 'product_models.model_number', 'product_numbers.product_number', 'product_numbers.titleName', 'product_numbers.serial_number')->get();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.product.index', ['product' => $product]);
    }

    // Export Products

    public function exportProducts()
    {
        return Excel::download(new ExportAllProduct, 'Product-collection.xlsx');
    }

    public function create()
    {
        try {
            $product_type = Product_type::all();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.product.create', ['product_type' => $product_type]);
    }

    public function createproductTypes()
    {
        return view('admin.product.addProductType');
    }

    public function productTypestore(Request $request)
    {
        try {
            // dd($request->all());
            $this->validate($request, [
                'name'                  => 'required',
            ]);

            $request = Product_type::create([
                'name'                  => $request->name
            ]);

            $request->save();

            return Redirect::back()->with('msg', 'New Product Type Add');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->back()->with("error", "Something is wrong !");
    }

    public function productSeries()
    {
        try {
            // dd($request->all());
            $product_type = Product_type::get();
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.product.addSeries', compact('product_type'));
    }

    public function productSeriesstore(Request $request)
    {
        try {
            $this->validate($request, [
                'product_types_id'      => 'required',
                'name'                  => 'required',
            ]);

            $form = Product::create([
                'product_types_id'      => $request->product_types_id,
                'name'                  => $request->name
            ]);

            // dd($form);

            $form->save();
            return Redirect::back()->with('msg', 'New Product Series Add');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->back()->with("error", "Something is wrong !");
    }

    public function productModelsCreate()
    {
        try {
            $data['product_type'] = Product_type::get(["name", "id"]);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.product.addModels', $data);
    }

    public function productModelsStore(Request $request)
    {
        // dd($request->all());
        try {
            $this->validate($request, [
                'products_id'                => 'required',
                'model_number'               => 'required',
            ]);

            $form = product_model::create([
                'products_id' => $request->products_id,
                'model_number' => $request->model_number
            ]);

            // dd($form);

            $form->save();
            return Redirect::back()->with('msg', 'New Product Model Add');
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->back()->with("error", "Something is wrong !");
    }

    public function productNumberCreate()
    {
        try {
            $data['product_type'] = Product_type::get(["name", "id"]);
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('admin.product.addProductNumber', $data);
    }

    public function productNumberStore(Request $request)
    {
        // dd($request->all());

        $checkproductnoexist = product_number::where('product_number', $request->product_number)->pluck('id')->first();
        // dd($checkproductnoexist);s
        try {
            $this->validate($request, [
                'product_model_id'                => 'required',
                'product_number'               => 'required',
                'titleName'               => 'required',
                'serial_number'               => 'required',
            ]);

            if ($checkproductnoexist > 0) {
                $checkserialnoexist = product_number::where('id', $checkproductnoexist)->whereRaw("NOT FIND_IN_SET('" . $request->serial_number . "','serial_number')")->first();
                $serialnumarr[] = explode(',', $checkserialnoexist->serial_number);
                // dd(in_array($request->serial_number, $serialnumarr[0]));

                if (in_array($request->serial_number, $serialnumarr[0]) == false) {
                    $form = \DB::statement("update `product_numbers` set serial_number=concat(serial_number,'," . $request->serial_number . "') where `id` = '" . $checkproductnoexist . "' ");
                    // $form = product_number::where('id',$checkproductnoexist)->update([
                    //     'serial_number' => concat(',',$requst->serial_number)update `product_numbers` set serial_number=concat(serial_number,',1234') where `id` = '1' and NOT FIND_IN_SET(".$request->serial_number.",serial_number);
                    // ]);

                    return Redirect::back()->with('msg', 'Update Serial number');
                } else {
                    return Redirect::back()->with('warning', 'Serial number is already exist.');
                }
            } else {
                $form = product_number::create([
                    'product_model_id'  => $request->product_model_id,
                    'product_number'    => $request->product_number,
                    'titleName'         => $request->titleName,
                    'serial_number'         => $request->serial_number
                ]);
                $form->save();
                return Redirect::back()->with('msg', 'New Product Number, Product Configuration & Serial number');
            }
        } catch (ModelNotFoundException $exception) {
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect()->back()->with("error", "Something is wrong !");
    }

    public function productConfigurationCreate()
    {
        $data['product_type'] = Product_type::get(["name", "id"]);
        return view('admin.product.addproductConfiguration', $data);
    }

    public function productConfigurationStore(Request $request)
    {
        // dd($request->all());
        $form = product_number::create([
            'product_model_id' => $request->product_model_id,
            'product_number' => $request->product_number,
            'titleName' => $request->titleName,
        ]);

        $form->save();
        return Redirect::back()->with('msg', 'The Message');
    }
}
