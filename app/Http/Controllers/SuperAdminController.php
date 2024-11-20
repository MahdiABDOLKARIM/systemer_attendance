<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class SuperAdminController extends Controller
{
    // نمایش فرم لاگین
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // پردازش لاگین
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // تلاش برای ورود
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // بررسی اینکه آیا کاربر سوپر ادمین است یا خیر
            if ($user->is_super_admin) {
                // اگر سوپر ادمین است، به صفحه داشبورد هدایت شود
                return redirect()->route('dashboard');
            } else {
                // اگر کاربر عادی است، از سیستم خارج شود و پیام خطا نمایش داده شود
                Auth::logout();
                return redirect()->route('superadmin.login.form')->withErrors(['error' => 'Only super admins can access.']);
            }
        }

        // در صورتی که اطلاعات ورود نادرست باشد
        return back()->withErrors(['error' => 'Invalid email or password.']);
    }
}
