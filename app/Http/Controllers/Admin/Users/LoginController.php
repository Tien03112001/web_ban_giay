<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Services\Authentication\AuthenticationService;
use App\Models\c;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class  LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $authenticationService;
    public function __construct(AuthenticationService $authenticationService)
    {
        $this->authenticationService = $authenticationService;
    }
    public function index()
    {
        return view('admin.users.login', [
            'title' => 'Đăng nhập',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'email' => 'required|email:filter',
        //     'password' => 'required'
        // ]);

        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role_id' => '0',
        ])) {

            return redirect()->route('admin');
        }
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'role_id' => '1',
        ])) {

            return redirect()->route('HomeCustomer');
        }
        /// đỗi chiếu tài khoản mật khẩu ở dtb và chuyển ra các view tương ứng
        if ($request->input('email') == null) {
            toastr()->error('Lỗi, Xin mời nhập email');
        } elseif ($request->input('password') == null) {
            toastr()->error('Lỗi, Xin mời nhập password');
        } else {
            toastr()->error('Lỗi, Xin mời nhập lại email và password');
        }
        // bắt lỗi
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        // $user::update(['password'=>bcrypt('123456789')]);
        // $d = Auth::user()->update(['password' => bcrypt(123456)]);
        // dd($d);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    public function getformregister()
    {
        return view('admin.users.register', [
            'title' => 'Trang đăng ký',
        ]);
    }
    public function register(Request $request)
    {
        if ($this->authenticationService->register($request)) {// truyền biến vào hàm register của authenticationService xử lý
            toastr()->success('Đăng ký thành công');
            return redirect('./admin/user/login');
        } else {
            return redirect()->back();
        }
    }
    public function getformchangepassword()
    {
        return view('admin.password.form', [
            'title' => 'Trang đổi mật khẩu'
        ]);
    }
    public function changePassword(Request $request)
    {
        // dd($this->validate($request, [
        //     'current_password' => 'required|string',
        //     'new_password' => 'required|string',
        //     'confirm_password' => 'required|string',
        // ]));

        if ($this->authenticationService->changePassword($request)) {
            toastr()->success('Đổi mật khẩu thành công');
            return redirect('./admin/main');
        } else {
            return redirect()->back();
        }
    }
}
