<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Attendance;

class EmployeeController extends Controller
{

    public function index()
    {
        $employees = Employee::all(); // دریافت تمام کارمندان
        return view('employees.index', compact('employees')); // ارسال داده‌ها به نمای مربوطه
    }

    // نمایش فرم افزودن کارمند
    public function create()
    {
        return view('employees.create');
    }

    // ذخیره کارمند جدید
    public function store(Request $request)
    {
        // اعتبارسنجی ورودی‌ها
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
        ]);

        // ایجاد کارمند جدید
        Employee::create([
            'name' => $request->name,
            'surname' => $request->surname,
        ]);

        // هدایت به صفحه یا بازگشت با پیام موفقیت
        return redirect()->route('employees.create')->with('success', 'کارمند جدید با موفقیت اضافه شد.');
    }
    public function showAttendance(Request $request)
{
    $day = $request->input('day');
    $month = $request->input('month');
    $employeeId = $request->input('employee_id');

    // دریافت لیست کارمندان برای انتخاب
    $employees = Employee::all();

    // ساخت کوئری برای فیلتر کردن تاریخ ورود و خروج بر اساس روز و ماه
    $query = Attendance::with('employee')->where('employee_id', $employeeId);

    if ($day) {
        $query->whereDay('check_in', $day);
    }

    if ($month) {
        $query->whereMonth('check_in', $month);
    }

    // اجرای کوئری
    $attendances = $query->get();

    // ارسال داده‌ها به ویو
    return view('attendance.index', compact('attendances', 'employees', 'employeeId'));
}

    public function destroy($id)
    {
        // پیدا کردن کارمند بر اساس آیدی
        $employee = Employee::findOrFail($id);
        
        // حذف کارمند
        $employee->delete();
        
        // بازگشت به صفحه لیست کارمندان با پیام موفقیت
        return redirect()->route('employees.index')->with('success', 'کارمند با موفقیت حذف شد.');
    }
    

}
