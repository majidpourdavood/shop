<?php

namespace App\Http\Controllers\Admin;

use App\Model\Category;
use App\Model\HeadProperty;
use App\Model\News;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->paginate(2000);
        return view('site.admin.category.all', compact('categories'));
    }

    public function activeCategory(Category $category)
    {
//        return $project;
//        return response()->json($project);

        if ($category->active == '0') {
            $category->update([
                'active' => '1'
            ]);
        } else if ($category->active == '1') {
            $category->update([
                'active' => '0'
            ]);
        } else {
            $category->update([
                'active' => '0'
            ]);
        }
        alert()->success('دسته با موفقیت ویرایش شد ', 'ویرایش دسته')
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
        $categories = Category::all();
        return view('site.admin.category.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'parent_id' => 'required',
            'image' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);

        $category = new Category();
        $category->title = $request->title;
        $category->parent_id = $request->parent_id;
        $category->type = $request->type;
        $category->type_weight = $request->type_weight;
        $category->active = $request->active;
        if ($request->hasFile('image')) {
            $filename = $request->file('image');
            $name = sha1(time() . $filename->getClientOriginalName());
            $extension = $filename->getClientOriginalExtension();
            $filename = "{$name}.{$extension}";
            $request->image->move(base_path('../public_html/images/category/'), $filename);
            $category->image = '/images/category/' .$filename;
        }

        $category->save();

        $headProperty = explode(',', $request->headProperties);
        $headProperties = new Collection();
        foreach ($headProperty as $key => $value) {
            if ($value != "" && $value !== ',' && $value !== ' ' && $value !== ', ' && $value !== ' , ' && $value !== ' ,' && $value != null) {
                $headProperties->push($value);
            }
        }


        foreach ($headProperties as $head) {
            $HeadProperty = new HeadProperty();
            $HeadProperty->name = $head;
            $HeadProperty->cate_id = $category->id;
            $HeadProperty->save();
        }

        alert()->success('دسته با موفقیت ذخیره شد', 'ذخیره دسته')->confirmButton('بستن')->autoclose('3000');

        return redirect()->route('category.index');
    }

    public function headPropertyPost(Request $request)
    {
        $headProperty = new HeadProperty();
        $headProperty->name = $request->name;
        $headProperty->cate_id = $request->cate_id;
        $headProperty->save();
        $response = [
            'status' => 'success',
            'headProperty' => $headProperty,
        ];
        return response()->json($response);
    }

    public function headPropertyUpdate(Request $request)
    {

        $headProperty = HeadProperty::find($request->id);
        $headProperty->name = $request->name;
        $headProperty->update();
        $response = [
            'status' => 'success',
            'headProperty' => $headProperty,
        ];
        return response()->json($response);
    }

    public function headPropertyDelete($id)
    {
        HeadProperty::where('id', '=', $id)->first()->delete();
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
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('site.admin.category.edit', compact(['category', 'categories']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//        $this->validate($request, [
//            'title' => 'required',
//            'list_head_property' => 'required',
//            'image' => 'required|image|mimes:jpeg,bmp,png,jpg',
//        ]);


        $category = Category::findOrFail($id);

        $category->title = $request->title;
        $category->parent_id = $request->parent_id;
        $category->type = $request->type;
        $category->type_weight = $request->type_weight;
        $category->active = $request->active;
        if ($request->hasFile('image')) {
            $filename = $request->file('image');
            $name = sha1(time() . $filename->getClientOriginalName());
            $extension = $filename->getClientOriginalExtension();
            $filename = "{$name}.{$extension}";
            $request->image->move(base_path('../public_html/images/category/'), $filename);
            $category->image = '/images/category/' .$filename;
        }

        $category->update();
        alert()->success('دسته با موفقیت ذخیره شد', 'ذخیره دسته')->confirmButton('بستن')->autoclose('3000');
        return redirect()->route('category.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {

        $category->delete();
        alert()->success('دسته با موفقیت حذف شد', 'حذف دسته')->confirmButton('بستن')->autoclose('3000');
        return back();
    }
}
