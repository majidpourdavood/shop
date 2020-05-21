<?php

namespace App\Http\Controllers\Admin;

use App\Model\OptionProperty;
use App\Model\Product;
use App\Model\Property;
use App\Model\PropertyProduct;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'asc')->paginate(200);
        return view('site.admin.product.all', compact('products'));
    }

//    public function sortableProduct()
//    {
//        $position = $_POST['sort'];
//
//        $i = 1;
//        foreach ($position as $k => $v) {
//           $products = Product::where('id', '=', $v)->update(array("sort" => $i));
//            $i++;
//        }
//        return response(['status' => 'sucsess', 'data' => $products]);
//
//    }

    public function activeProduct(Product $product)
    {
//        return $project;
//        return response()->json($project);

        if ($product->active == '0') {
            $product->update([
                'active' => '1',
                'created_at' => Carbon::now()
            ]);
        } else if ($product->active == '1') {
            $product->update([
                'active' => '0',
                'created_at' => Carbon::now()
            ]);
        } else {
            $product->update([
                'active' => '0',
                'created_at' => Carbon::now()
            ]);
        }
        alert()->success('محصول با موفقیت ویرایش شد ', 'ویرایش محصول')
            ->confirmButton('بستن')->autoclose(3000);
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.admin.product.create');
    }

    public function uploadFile(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'file' => 'required|mimes:jpeg,bmp,png,jpg|max:20480',

        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        } else {
            if ($request->hasFile('file')) {
                $filename = $request->file('file');
                $name = sha1(time() . $filename->getClientOriginalName());
                $extension = $filename->getClientOriginalExtension();
                $filename = "{$name}.{$extension}";
                $request->file->move(base_path('../public_html/images/product/'), $filename);
//                $request->file('file')->move(base_path('/public/images/product/'), $filename);
            }
            $response = [
                'msg' => 'فایل آپلود شد',
                'filename' => '/images/product/' . $filename,
                'status' => 'success',
            ];
            return response()->json($response);
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
//            'price' => 'required|numeric',
            'cate_id' => 'required',
        ]);
        $productCode = 'YAR-' . randomNumber(9);
        if (in_array(trim($productCode), Product::all()->pluck('code')->toArray())) {
            $productCode = 'YAR-' . randomNumber(9);
        }

        $allimages = explode(',', $request->images);
        $images = new Collection();
        foreach ($allimages as $key => $value) {
            if ($value != "" && $value !== ',' && $value !== ' ' && $value !== ', ' && $value !== ' , ' && $value !== ' ,' && $value != null) {
                $images->push($value);
            }
        }

        $product = new Product();
        $product->title = $request->title;
        $product->slug = str_replace(' ', '-', $request->title);
        $product->body = $request->body;
        $product->meta_description = $request->meta_description;
//        $product->price = $request->price;
        $product->code = $productCode;
        $product->cate_id = $request->cate_id;
//        $product->discount = $request->discount;
        $product->type = $request->type;
        $product->brand_id = $request->brand_id;
        $product->active = $request->active;
//        $product->stock = $request->stock;
//        $product->post_work_day = $request->post_work_day;
        $product->user_id = auth()->user()->id;
        $product->images = $images;

        $product->save();
        alert()->success('محصول با موفقیت ذخیره شد', 'ذخیره محصول')->confirmButton('بستن')->autoclose('3000');

        return redirect()->route('product.index');
    }

    public function edit(Product $product)
    {
        return view('site.admin.product.edit', compact('product'));

    }



    public function addPropertyProduct(Product $product)
    {
//        $string = $product->details['color'];
//        $colors = json_decode($string, true);

        return view('site.admin.product.addPropertyProduct', compact(['product']));
    }

    public function storePropertyProduct(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $allRequest = request()->except(['_method', '_token', 'color', 'size', 'product_id' , 'key_value_id']);
        foreach ($allRequest as $key => $value) {

            $PropertyProductExist = PropertyProduct::where('property_id', $key)
                ->where('product_id', $product->id)
              ->first();

            if ($PropertyProductExist) {

                $PropertyProductExist->property_id = $key;
                $PropertyProductExist->product_id = $product->id;
                if (is_numeric($value)) {
                    $PropertyProductExist->option_property_id = $value;
                } else {
                    $PropertyProductExist->value = $value;
                }
                $PropertyProductExist->update();
            } else {
                $propertyProduct = new PropertyProduct();
                $propertyProduct->property_id = $key;
                $propertyProduct->product_id = $product->id;
                if (is_numeric($value)) {
                    $propertyProduct->option_property_id = $value;
                } else {
                    $propertyProduct->value = $value;
                }
                $propertyProduct->save();
            }

        }

        //        return back();
        return redirect()->route('product.index');


    }

//    public function propertyProductPost(Request $request)
//    {
//        $propertyProduct = new PropertyProduct();
//        $propertyProduct->price = $request->price;
//        $propertyProduct->product_id = $request->product_id;
//        $propertyProduct->type = Property::findOrFail($request->property_id)->type;
//        $propertyProduct->property_id = $request->property_id;
//        $propertyProduct->key_value_id = $request->key_value_id;
//        $propertyProduct->save();
//        $response = [
//            'status' => 'success',
//            'propertyProduct' => $propertyProduct,
//            'property' => $propertyProduct->property,
//            'keyValue' => $propertyProduct->keyValue,
//        ];
//        return response()->json($response);
//    }
//
//    public function propertyProductDelete($id)
//    {
//        PropertyProduct::where('id', '=', $id)->first()->delete();
//        return response()->json([
//            'status' => 'success',
//        ]);
//    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
//            'price' => 'required|numeric',
            'cate_id' => 'required',
        ]);

//        $productCode = 'YAR-'.randomNumber(9);
//        if (in_array(trim($productCode), Product::all()->pluck('code')->toArray())) {
//            $productCode = 'YAR-' . randomNumber(9);
//        }

        $allimages = explode(',', $request->images);
        $images = new Collection();
        foreach ($allimages as $key => $value) {
            if ($value != "" && $value !== ',' && $value !== ' ' && $value !== ', ' && $value !== ' , ' && $value !== ' ,' && $value != null) {
                $images->push($value);
            }
        }
        $product = Product::findOrFail($id);
        $product->title = $request->title;
        $product->slug = str_replace(' ', '-', $request->title);
        $product->body = $request->body;
        $product->meta_description = $request->meta_description;
//        $product->price = $request->price;
        $product->cate_id = $request->cate_id;
//        $product->discount = $request->discount;
        $product->type = $request->type;
        $product->brand_id = $request->brand_id;
        $product->active = $request->active;
//        $product->stock = $request->stock;
//        $product->post_work_day = $request->post_work_day;
        $product->user_id = auth()->user()->id;
        $product->images = $images;

        $product->update();
        alert()->success('محصول با موفقیت ذخیره شد', 'ویرایش محصول')->confirmButton('بستن')->autoclose('3000');

        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        $product->delete();
        alert()->success('محصول با موفقیت حذف شد', 'حذف محصول')->confirmButton('بستن')->autoclose('3000');
        return back();
    }
}
