<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAttendanceTable extends Migration
{
    public function up()
    {
        Schema::create('employee_attendance', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained()->onDelete('cascade'); // Foreign key به جدول employees
            $table->timestamp('check_in')->nullable(); // زمان ورود
            $table->timestamp('check_out')->nullable(); // زمان خروج
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employee_attendance');
    }
}