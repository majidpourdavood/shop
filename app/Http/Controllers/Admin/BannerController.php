<?php

namespace App\Http\Controllers\Admin;

use App\Model\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::latest()->paginate(2000);
        return view('site.admin.banner.all', compact('banners'));
    }

    public function activeBanner(Banner $banner)
    {
//        return $project;
//        return response()->json($project);

        if ($banner->active == '0') {
            $banner->update([
                'active' => '1'
            ]);
        } else if ($banner->active == '1') {
            $banner->update([
                'active' => '0'
            ]);
        } else {
            $banner->update([
                'active' => '0'
            ]);
        }
        alert()->success('بنر با موفقیت ویرایش شد ', 'ویرایش بنر')
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
        return view('site.admin.banner.create');
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
            'image' => 'image|mimes:jpeg,bmp,png,jpg',
        ]);

        $banner = new Banner();
        $banner->title = $request->title;
        $banner->slug = str_replace(' ', '-', $request->title);
        $banner->discount = $request->discount;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->active = $request->active;
        if ($request->hasFile('image')) {
            $filename = $request->file('image');
            $name = sha1(time() . $filename->getClientOriginalName());
            $extension = $filename->getClientOriginalExtension();
            $filename = "{$name}.{$extension}";
//            $request->image->move(base_path('../public_html/images/banner/'), $filename);
            $request->image->move(public_path('/images/banner/'), $filename);
            $banner->image = '/images/banner/' .$filename;
        }

        $banner->save();

        alert()->success('بنر با موفقیت ذخیره شد', 'ذخیره بنر')->confirmButton('بستن')->autoclose('3000');

        return redirect()->route('banner.index');
    }




    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('site.admin.banner.edit', compact(['banner']));

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


        $banner = Banner::findOrFail($id);

        $banner->title = $request->title;
        $banner->slug = str_replace(' ', '-', $request->title);
        $banner->discount = $request->discount;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->active = $request->active;
        if ($request->hasFile('image')) {
            $filename = $request->file('image');
            $name = sha1(time() . $filename->getClientOriginalName());
            $extension = $filename->getClientOriginalExtension();
            $filename = "{$name}.{$extension}";
//            $request->image->move(base_path('../public_html/images/banner/'), $filename);
            $request->image->move(public_path('/images/banner/'), $filename);
            $banner->image = '/images/banner/' .$filename;
        }

        $banner->update();
        alert()->success('بنر با موفقیت ذخیره شد', 'ذخیره بنر')->confirmButton('بستن')->autoclose('3000');
        return redirect()->route('banner.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {

        $banner->delete();
        alert()->success('بنر با موفقیت حذف شد', 'حذف بنر')->confirmButton('بستن')->autoclose('3000');
        return back();
    }
}
