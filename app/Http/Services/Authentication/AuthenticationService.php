<?php

namespace App\Http\Services\Authentication;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthenticationService
{
    public function changePassword($request)
    {
        if (!Hash::check($request->get('curent_password'), Auth::user()->password)) {
            toastr()->error('Mật khẩu cũ không chính xác');
            return false;
        }
        if ($request->input('new_password') != $request->input('confirm_password')) {
            toastr()->error('Mật khẩu nhập lại chưa chính xác');
            return false;
        }
        if ($request->input('new_password') == null or $request->input('curent_password') == null or $request->input('confirm_password') == null) {
            toastr()->error('Vui lòng điền đủ các trường');
            return false;
        }
        /// bắt lỗi 
        $user =  User::where('id', Auth::user()->id)->first();
        $user->password =  bcrypt($request->input('new_password'));
        $user->save();
        return true;
        // đổi mật khẩu
    }
    public function register($request)
    {
        if ($request->input('name') == null or $request->input('email') == null or $request->input('password') == null or $request->input('confirm_password') == null) {
            toastr()->error('Vui lòng điền đủ các trường');
            return false;
        } elseif ($request->input('agree') != 'on') {
            toastr()->error('Vui lòng đồng ý điều khoản để đăng ký');
            return false;
        } elseif ($request->input('password') != $request->input('confirm_password')) {
            toastr()->error('Mật khẩu nhập lại chưa chính xác');
            return false;
            //bắt lỗi 
        } else {
        User::create([
            'name' => (string) $request->input('name'),
            'email' => (string) $request->input('email'),
            'password' => Hash::make($request->input('password')),

        ]);//đăng ký theo các dữ liệu được request gửi lên
        return true;
        }
    }
}
