<?php

namespace App\Http\Controllers\Admin;

use App\Model\Comment;
use App\Model\Contact;
use App\Model\News;
use App\Model\Blog;
use App\Model\Product;
use App\Model\Ticket;
use App\User;
use Carbon\Carbon;
use Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index()
    {

//     return   User::whereHas(
//            'roles', function ($q) {
//            $q->where('name', 'designer');
//        })->withCount(['ratings as average_rating' => function($query) {
//         $query->select(DB::raw('coalesce(avg(rating),0)'));
//     }])->orderByDesc('average_rating')->take(5)->get();
//        return \request()->session()->all();


//        $users = Blog::all();
//        foreach ($users as $user) {
//            $user->created_at = Carbon::now();
//            $user->update();
//        }
//        $products = Product::all();
//        foreach ($products as $product) {
//            $product->created_at = Carbon::now();
//            $product->update();
//        }

//        $tickets = Ticket::all();
//        foreach ($tickets as $ticket) {
//            if ($ticket->updated_at->addDays(14) < Carbon::today()) {
//                $ticket->status = 5;
//                $ticket->update();
//            }
//        }
        $users = User::all()->count();
//        $comments = Comment::all()->count();
//        $tickets = Ticket::all()->count();
        $blogs = Blog::all()->count();
        return view('site.admin.dashboard' , compact(['users', 'blogs']));

    }

    public function indexContact()
    {
        $contacts = Contact::latest()->paginate(200);
        return view('site.admin.contacts.all', compact('contacts'));
    }

    public function destroyContact(Contact $contact)
    {
        $contact->delete();
        return back();
    }

    public function notifications()
    {

        $notifications = auth()->user()->notifications;
        auth()->user()->unreadNotifications->markAsRead();
        return view('site.admin.notification', compact(['notifications']));
    }

    public function uploadImageSubject()
    {
        $this->validate(request(), [
            'upload' => 'required|mimes:jpeg,png,bmp',
        ]);

        $year = Carbon::now()->year;
        $imagePath = "/upload/images/{$year}/";

        $file = request()->file('upload');
        $name = sha1(time() . $file->getClientOriginalName());
        $extension = $file->getClientOriginalExtension();
        $filename = "{$name}.{$extension}";

        if (file_exists(public_path($imagePath) . $filename)) {
            $filename = request()->file('upload');
            $name = sha1(time() . $filename->getClientOriginalName());
            $extension = $filename->getClientOriginalExtension();
            $filename = "{$name}.{$extension}";
        }

        $file->move(public_path('../../public_html/' . $imagePath), $filename);
        $url = $imagePath . $filename;

        return "<script>window.parent.CKEDITOR.tools.callFunction(1 , '{$url}' , '')</script>";
    }

}
