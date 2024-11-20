<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Hash;

class AdminController extends Controller
{
    // نمایش فرم اضافه کردن ادمین
    public function create()
    {
        return view('admin.create');
    }

    // ذخیره ادمین جدید
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_super_admin' => false, // ادمین معمولی
        ]);

        return redirect()->route('admin.index')->with('success', 'ادمین جدید با موفقیت اضافه شد');
    }

    // نمایش لیست ادمین‌ها
    public function index()
    {
        $admins = Admin::all();
        return view('admin.index', compact('admins'));
    }
    public function destroy($id)
    {
        $admin = User::find($id);
        if ($admin) {
            $admin->delete();
        }

        return redirect()->route('admin.index')->with('success', 'ادمین با موفقیت حذف شد.');
    }
}

