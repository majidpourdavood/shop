<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Http\Controllers\Controller;
use App\Model\OptionProperty;
use App\Model\Property;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;


class PropertyController extends Controller
{

    public function addProperty($id)
    {
        $category = Category::findOrFail($id);
        return view('site.admin.property.create', compact('category'));
    }


    public function storeProperty(Request $request)
    {
//        return $request;
//        $this->validate($request, [
//            'key' => 'required',
//
//        ]);

        if ($request->type == 1) {
//            return $request->name_price;

//            $category = Category::findOrFail($request->cate_id);
//            $colorKey = $category->properties()->where('key', 'color')->get();
//            if (count($colorKey) > 0) {
//                alert()->error('شما قبلا ویژگی رنگ را اضافه کردید!!', 'خطا')
//                    ->confirmButton('بستن')->autoclose('3000');
//                return back();
//            }
//
//            $sizeKey = $category->properties()->where('key', 'size')->get();
//            if (count($sizeKey) > 0) {
//                alert()->error('شما قبلا ویژگی سایز را اضافه کردید!!', 'خطا')
//                    ->confirmButton('بستن')->autoclose('3000');
//                return back();
//            }
            foreach ($request->name_price as $item) {

                $propertyExsit = Property::where('cate_id', $request->cate_id)
                    ->where('key', $item)->first();
                if ($propertyExsit){

                }else{
                    if ($item == 'color') {
                        $name = 'رنگ';
                    } elseif ($item = 'size') {
                        $name = 'سایز';
                    }
                    $property = new Property();
                    $property->name = $name;
                    $property->type = $request->type;
                    $property->cate_id = $request->cate_id;
                    $property->show_place = $request->show_place;
                    $property->key = $item;
                    $property->save();
                }

            }
            alert()->success('ویژگی با موفقیت ثبت شد', 'ذخیره ویژگی')->confirmButton('بستن')->autoclose('3000');

            return back();
        } else {

            $propertyExsit = Property::where('cate_id', $request->cate_id)
                ->where('key', $request->key)->first();
            if ($propertyExsit){

            }else{

                $property = new Property();
                $property->name = $request->name;
                $property->head_property_id = $request->head_property_id;
                $property->cate_id = $request->cate_id;
                $property->show_place = $request->show_place;
                $property->type = $request->type;
                $property->key = $request->key;
                $property->save();

                $optionProperty = explode(',', $request->optionProperty);
                $optionProperties = new Collection();
                foreach ($optionProperty as $key => $value) {
                    if ($value != "" && $value !== ',' && $value !== ' ' && $value !== ', ' && $value !== ' , ' && $value !== ' ,' && $value != null) {
                        $optionProperties->push($value);
                    }
                }


                foreach ($optionProperties as $option) {
                    $optionProperty3 = new OptionProperty();
                    $optionProperty3->value = $option;
                    $optionProperty3->property_id = $property->id;
                    $optionProperty3->save();
                }


            }
            alert()->success('ویژگی با موفقیت ثبت شد', 'ذخیره ویژگی')->confirmButton('بستن')->autoclose('3000');

            return back();

        }

    }


    public function optionPropertyPost(Request $request)
    {
        $optionProperty = new OptionProperty();
        $optionProperty->value = $request->value;
        $optionProperty->property_id = $request->property_id;
        $optionProperty->save();
        $response = [
            'status' => 'success',
            'optionProperty' => $optionProperty,
        ];
        return response()->json($response);
    }

    public function optionPropertyUpdate(Request $request)
    {

        $optionProperty = OptionProperty::find($request->id);
        $optionProperty->value = $request->value;
        $optionProperty->update();
        $response = [
            'status' => 'success',
            'optionProperty' => $optionProperty,
        ];
        return response()->json($response);
    }

    public function optionPropertyDelete($id)
    {
        OptionProperty::where('id', '=', $id)->first()->delete();
        return response()->json([
            'status' => 'success',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function editProperty($id)
    {
        $property = Property::findOrFail($id);
        $category = $property->category;
        return view('site.admin.property.edit', compact(['category', 'property']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function updateProperty(Request $request, $id)
    {
//        $this->validate($request, [
//            'title' => 'required',
//            'list_head_property' => 'required',
//            'image' => 'required|image|mimes:jpeg,bmp,png,jpg',
//        ]);
        if ($request->type == 1) {
//            return $request->name_price;
            foreach ($request->name_price as $item) {

                $propertyExsit = Property::where('cate_id', $request->cate_id)
                    ->where('key', $item)->first();
                if ($propertyExsit){

                }else{
                    if ($item == 'color') {
                        $name = 'رنگ';
                    } elseif ($item = 'size') {
                        $name = 'سایز';
                    }
                    $property = new Property();
                    $property->name = $name;
                    $property->type = $request->type;
                    $property->cate_id = $request->cate_id;
                    $property->show_place = $request->show_place;
                    $property->key = $item;
                    $property->save();
                }

            }
            alert()->success('ویژگی با موفقیت ثبت شد', 'ذخیره ویژگی')->confirmButton('بستن')->autoclose('3000');

            return redirect()->route('addProperty', $property->category->id);
        } else {
            $property = Property::findOrFail($id);
            $property->name = $request->name;
            $property->head_property_id = $request->head_property_id;
            $property->cate_id = $request->cate_id;
            $property->show_place = $request->show_place;
            $property->type = $request->type;
            $property->key = $request->key;
            $property->update();

            alert()->success('ویژگی با موفقیت ذخیره شد', 'ذخیره ویژگی')->confirmButton('بستن')->autoclose('3000');

            return redirect()->route('addProperty', $property->category->id);
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function deleteProperty(Property $property)
    {

        $property->delete();
        alert()->success('ویژگی با موفقیت حذف شد', 'حذف ویژگی')->confirmButton('بستن')->autoclose('3000');
        return back();
    }
}
