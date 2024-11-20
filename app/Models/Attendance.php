<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Attendance extends Model
{
    use HasFactory;

    protected $table = 'employee_attendance'; // نام جدول جدید
    protected $fillable = [
        'employee_id',
        'check_in',
        'check_out',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
