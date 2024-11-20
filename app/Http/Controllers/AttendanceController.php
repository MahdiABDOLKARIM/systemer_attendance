<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index(Request $request)
{
    
    // دریافت همه کارمندان
    $employees = Employee::all();


    return view('attendance.index', compact('employees'));
}

public function checkIn(Request $request, $employeeId)
{
    $attendance = new Attendance();
    $attendance->employee_id = $employeeId;
    $attendance->check_in = now(); // زمان حال
    $attendance->save();

    return redirect()->back()->with('success', 'ورود ثبت شد.');
}

    public function checkOut(Request $request, $id)
    {
        $attendance = Attendance::where('employee_id', $id)->latest()->first();
        
        if ($attendance) {
            $attendance->update(['check_out' => now()]);
            return redirect()->route('attendance.index')->with('success', 'زمان خروج کارمند ثبت شد.');
        }

        return redirect()->route('attendance.index')->with('error', 'ثبت زمان ورود وجود ندارد.');
    }
    public function filter(Request $request)
    {
        // دریافت پارامترهای فیلتر
        $day = $request->input('day');
        $month = $request->input('month');
        $employeeId = $request->input('employee_id');
    
        // فیلتر رکوردها از دیتابیس
        $attendances = Attendance::query()
            ->when($day, function ($query, $day) {
                $query->whereDay('check_in', $day);
            })
            ->when($month, function ($query, $month) {
                $query->whereMonth('check_in', $month);
            })
            ->when($employeeId, function ($query, $employeeId) {
                $query->where('employee_id', $employeeId);
            })
            ->get();
    
        // ارسال لیست کاربران برای نمایش در فرم
        $employees = Employee::all();
    
        return view('attendance.filter', compact('attendances', 'employees'));
    }
    

}
