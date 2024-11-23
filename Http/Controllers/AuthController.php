<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('login.signin');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Validate request
        $request->validate([
            'email' => 'required|email',
            'mat_khau' => 'required',
        ]);

        $email = $request->input('email');
        $passwordToCheck = $request->input('mat_khau');

        $error_message = 'Thông tin đăng nhập không chính xác.'; 
        // Check if the user is an employee (User)
        $user = User::where('email', $email)->first();
        if ($user) {
            if (Hash::check($passwordToCheck, $user->mat_khau)) {
                Auth::login($user);
                return redirect()->route('index'); 
            } else {
                $error_message = 'Mật khẩu không chính xác cho tài khoản nhân viên.';
            }
        } else {
        
            $customer = Customer::where('email', $email)->first();

            if ($customer) {
                if (Hash::check($passwordToCheck, $customer->mat_khau)) {
                    Auth::guard('customers')->login($customer); 
                    session(['ma_khach_hang' => $customer->ma_khach_hang]);
                    session(['ten_khach_hang' => $customer->ten_khach_hang]);
                    return redirect()->route('maininterface');
                } else {
                    $error_message = 'Mật khẩu không chính xác cho tài khoản khách hàng.';
                }
            } else {
                $error_message = 'Email không tồn tại.';
            }
        }

        
        return redirect()->route('login')->withErrors([
            'email' => $error_message,
        ]);
    }

    // Đăng xuất
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function logoutcus()
    {
        Session::forget('ma_khach_hang'); 
        Session::forget('ten_khach_hang'); 

        Auth::guard('customers')->logout(); 
        return redirect('/customer/maininterface/{luot_xem?}/{ma_loai?}');
    }
}
