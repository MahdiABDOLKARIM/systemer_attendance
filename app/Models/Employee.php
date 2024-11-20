<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\attendanc;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
    public function lastAttendance()
    {
        return $this->attendances()->latest()->first();
    }
}