<?php

namespace App\Http\Controllers\Admin;

use App\ActivationCode;
use App\Location;
use App\Mail\MailSendUser;
use App\Mail\MessageActiveDesigner;
use App\Notifications\NotificationActiveDesigner;
use App\Notifications\NotificationSendUser;
use App\Role;
use App\SendSms\SendSmsAll;
use App\SendSms\SendSmsOther;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(2000);
        return view('site.admin.user.all', compact('users'));
    }

    public function create()
    {

        return view('site.admin.user.create');
    }

    public function myformAjax($id)
    {
        $cities = Location::where('parent_id', '=', $id)
            ->where('parent_id', '!=', 0)
            ->pluck("name", "id")->all();
        return json_encode($cities);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,bmp,png,jpg|max:10240',
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits:11',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        $user = new User();
        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->slug_user = str_replace(' ', '-', $request->name) . '-' .
            str_replace(' ', '-', $request->lastName);
        $user->email = $request->email;
        $user->location_id = $request->location_id;
        $user->phone = $request->phone;
        $user->password = $request->phone;
        $user->phoneHome = $request->phoneHome;
        $user->address = $request->address;
        $user->post = $request->post;
        $user->active = $request->active;
        $user->birthDay = $request->birthDay;
        $user->aboutMe = $request->aboutMe;
        if ($request->hasFile('image')) {
            $filename = $request->file('image');
            $name = sha1(time() . $filename->getClientOriginalName());
            $extension = $filename->getClientOriginalExtension();
            $filename = "{$name}.{$extension}";
            $request->image->move(storage_path('app/public/imageUser/'), $filename);
            $user->image = $filename;
        }
        $user->save();
        alert()->success('کاربر با موفقیت ثبت شد', 'ثبت کاربر')->autoclose('3000');
        return redirect()->route('users.index');
    }

    public function levelUser(User $user)
    {
        if ($user->level == 'admin') {
            $user->update([
                'level' => 'user'
            ]);
        } else if ($user->level == 'user') {
            $user->update([
                'level' => 'admin'
            ]);
        } else {
            $user->update([
                'level' => 'user'
            ]);
        }
        return back();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }

    public function showResetForm(User $user)
    {
        return view('site.admin.user.resetpassword', compact('user'));
    }

    public function showEditForm(User $user)
    {
        return view('site.admin.user.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'image|mimes:jpeg,bmp,png,jpg|max:10240',
            'name' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255',
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->slug_user = str_replace(' ', '-', $request->name) . '-' .
            str_replace(' ', '-', $request->lastName);
        $user->email = $request->email;
        $user->location_id = $request->location_id;
        $user->phone = $request->phone;
        $user->phoneHome = $request->phoneHome;
        $user->address = $request->address;
        $user->active = $request->active;
        $user->birthDay = $request->birthDay;
        $user->post = $request->post;
        $user->aboutMe = $request->aboutMe;
        if ($request->hasFile('image')) {
            $filename = $request->file('image');
            $name = sha1(time() . $filename->getClientOriginalName());
            $extension = $filename->getClientOriginalExtension();
            $filename = "{$name}.{$extension}";
            $request->image->move(storage_path('app/public/imageUser/'), $filename);
            $user->image = $filename;
        }
        $user->update();
        alert()->success('کاربر با موفقیت ویرایش شد', 'ویرایش کاربر')->autoclose('3000');
        return redirect()->route('users.index');
    }

    public function activeUser(User $user)
    {

        if ($user->active == 0) {
            $user->update([
                'active' => 1
            ]);


        } else if ($user->active == 1) {
            $user->update([
                'active' => 0
            ]);

        } else {
            $user->update([
                'active' => 0
            ]);

        }

        return back()->with('info', 'کاربر با موفقیت ویرایش شد');
    }

    public function updatePassword(Request $request, $id)
    {

        $this->validate($request, [
            'password' => 'required|confirmed|min:6',
        ]);
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->update();
        alert()->success('کاربر با موفقیت ویرایش شد', ' ویرایش کاربر')
            ->confirmButton('بستن')->autoclose(3000);
        return redirect()->route('users.index');


    }

}
