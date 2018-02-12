<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function getHome()
    {
        return view('home');
    }

    public function getProfile()
    {
        return view('user.information_user')->with('user', Auth::user());
    }

    public function postUpdateProfile(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|min:6|max:20|unique:users,name,'.$user->id,
            'about' => 'required|min:6|max:255',
        ], [
            'name.required' => 'Bạn chưa nhập tên hiển thị',
            'name.min' => 'Tên hiển thị phải từ 6 đến 20 ký tự',
            'name.max' => 'Tên hiển thị phải từ 6 đến 20 ký tự',
            'name.unique' => 'Tên hiển thị đã được sử dụng',
            'about.required' => 'Bạn chưa nhập nội dung giới thiệu',
            'name.min' => 'Nội dung giới thiệu phải từ 6 đến 255 ký tự',
            'name.max' => 'Nội dung giới thiệu phải từ 6 đến 255 ký tự',
        ]);

        
        $user->name = $request->name;
        $user->about = $request->about;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            if ($ext != 'jpg' && $ext != 'jpeg' && $ext != 'png') {
                return redirect()->route('profile')->with('user', $user)->with('error_image_type', 'Bạn chỉ được nhập file jpg, jpeg, png');
            }
            $name_file = $file->getClientOriginalName();
            $name = str_random(4)."_".$name_file;
            while (file_exists("image/".$name)) {
                $name = str_random(4)."_".$name_file;
            }
            $file->move("image/user", $name);
            $user->image = $name;
        }
        $user->save();

        return redirect()->route('profile')->with('user', $user)->with('success', 'Cập nhật thành công !!!');
    }

    public function postChangePassword(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'password' => 'required|min:6|max:32',
            'password_confirmation' => 'required|min:6|max:32|same:password',
        ], [
            'password.required' => 'Bạn chưa nhập mật khẩu mới',
            'password.min' => 'Mật khẩu phải có từ 6 đến 32 ký tự',
            'password.max' => 'Mật khẩu phải có từ 6 đến 32 ký tự',
            'password_confirmation.required' => 'Bạn chưa nhập lại mật khẩu mới',
            'password_confirmation.min' => 'Mật khẩu phải có từ 6 đến 32 ký tự',
            'password_confirmation.max' => 'Mật khẩu phải có từ 6 đến 32 ký tự',
            'password_confirmation.same' => 'Nhập lại mật khẩu sai',
        ]);

        $user->password = bcrypt($request->password);
        $user->save();

        return redirect()->route('profile')->with('user', $user)->with('success', 'Cập nhật thành công !!!');
    }
}
