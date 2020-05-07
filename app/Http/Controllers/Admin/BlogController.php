<?php

namespace App\Http\Controllers\Admin;

use App\Model\Blog;
use App\Model\Taggable;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('sort', 'asc')->paginate(2000);
        return view('admin.blog.all', compact('blogs'));
    }


    public function sortableBlog()
    {
        $position = $_POST['sort'];

        $i = 1;
        foreach ($position as $k => $v) {
            $blogs = Blog::where('id', '=', $v)->update(array("sort" => $i));
            $i++;
        }
        return response(['status' => 'sucsess', 'data' => $blogs]);

    }

    public function activeBlog($id)
    {
//        return $project;
//        return response()->json($project);
        $blog = Blog::find($id);
        if ($blog->active == 0) {
            $blog->active = 1;
            $blog->created_at = Carbon::now();
            $blog->update();

        } else if ($blog->active == 1) {
            $blog->active = 0;
            $blog->created_at = Carbon::now();
            $blog->update();
        } else {
            $blog->active = 0;
            $blog->created_at = Carbon::now();
            $blog->update();
        }
        alert()->success('بلاگ با موفقیت ویرایش شد ', 'ویرایش بلاگ')
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
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

//    public function productImage($filename)
//    {
//        $path = storage_path('app/public/productImage/' . $filename);
//        if (!File::exists($path)) {
//            abort(404);
//        }
//        $file = File::get($path);
//        $type = File::mimeType($path);
//
//        $response = Response::make($file, 200);
//        $response->header("Content-Type", $type);
//
//        return $response;
//    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:blogs',
            'body' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,bmp,png,jpg',
        ]);
        $blogCode = randomNumber(9);
        if (in_array(trim($blogCode), Blog::all()->pluck('codeNumber')->toArray())) {
            $blogCode = randomNumber(9);
        }
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug_blog = str_replace(' ', '-', $request->title);
        $blog->body = $request->body;
        $blog->meta_description = $request->meta_description;
        $blog->description = $request->description;
        $blog->sort = $request->sort;

        $blog->codeNumber = $blogCode;
        $blog->active = $request->active;
        $blog->user_id = auth()->user()->id;
        $blog->cate_id = $request->cate_id;
        if ($request->hasFile('image')) {
            $filename = $request->file('image');
            $name = sha1(time() . $filename->getClientOriginalName());
            $extension = $filename->getClientOriginalExtension();
            $filename = "{$name}.{$extension}";
            $request->image->move(base_path('../public_html/images/blog/'), $filename);
            $blog->image = $filename;
        }

        $blog->save();
        alert()->success('بلاگ با موفقیت ذخیره شد', 'ذخیره بلاگ')->confirmButton('بستن')->autoclose('3000');

        return redirect()->route('blog.index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));

    }

    public function addHashTagBlog(Blog $blog)
    {
        $blogTags = $blog->taggables()->with('tag')->get();

        return view('admin.blog.hashTag', compact(['blog', 'blogTags']));

    }

    public function storeHashTagBlog(Request $request, Blog $blog)
    {
        $tag = new Taggable();
        $tag->tag_id = $request->tag_id;
        $tag->user_id = auth()->user()->id;
        $tag->taggable_id = $request->taggable_id;
        $tag->taggable_type = $request->taggable_type;

        if (in_array(trim($tag->tag_id), $blog->tags->pluck('id')->toArray())) {
            return response()->json([
                'error' => 'Record not saved successfully!',
                'data' => $tag,
                'tag' => $tag->tag()->first(),
                'array' => $blog->tags->pluck('id')->toArray()
            ]);

        } else {
            $tag->save();
            return response()->json([
                'success' => 'Record saved successfully!',
                'data' => $tag,
                'tag' => $tag->tag()->first(),
                'array' => $blog->tags->pluck('id')->toArray()
            ]);
        }


    }

    public function destroyHashTagBlog($id)
    {
        Taggable::find($id)->delete();
        return response()->json([
            'success' => 'Record deleted successfully!'
        ]);
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
//            'title' => 'required|unique:blogs',
//        ]);

        $blogCode = randomNumber(9);
        if (in_array(trim($blogCode), Blog::all()->pluck('codeNumber')->toArray())) {
            $blogCode = randomNumber(9);
        }
        $blog = Blog::findOrFail($id);
        $blogTitle = Blog::where('title', '=', $request->title)->where('id', '!=', $id)->get();
        if (count($blogTitle) > 0) {
            alert()->error('عنوان قبلا انتخاب شده است.', ' خطا')->confirmButton('بستن')->autoclose('3000');
            return back();
        }
        $blog->title = $request->title;
        $blog->slug_blog = str_replace(' ', '-', $request->title);
        $blog->body = $request->body;
        $blog->meta_description = $request->meta_description;
        $blog->description = $request->description;
        $blog->codeNumber = $blogCode;
        $blog->active = $request->active;
        $blog->user_id = auth()->user()->id;
        $blog->cate_id = $request->cate_id;
        $blog->sort = $request->sort;

        if ($request->hasFile('image')) {
            $filename = $request->file('image');
            $name = sha1(time() . $filename->getClientOriginalName());
            $extension = $filename->getClientOriginalExtension();
            $filename = "{$name}.{$extension}";
            $request->image->move(base_path('../public_html/images/blog/'), $filename);
            $blog->image = $filename;
        }

        $blog->update();
        alert()->success('بلاگ با موفقیت ذخیره شد', 'ویرایش بلاگ')->confirmButton('بستن')->autoclose('3000');
        return redirect()->route('blog.index');

    }

    public function updateCreatedTimeBlog($id)
    {
        $product = Blog::findOrFail($id);
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();

        $product->update();
        alert()->success('بلاگ با موفقیت ذخیره شد', 'ویرایش بلاگ')->confirmButton('بستن')->autoclose('3000');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {

        $blog->delete();
        alert()->success('بلاگ با موفقیت حذف شد', 'حذف بلاگ')->confirmButton('بستن')->autoclose('3000');
        return back();
    }
}
