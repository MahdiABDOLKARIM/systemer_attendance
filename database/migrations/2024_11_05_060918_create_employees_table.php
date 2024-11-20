<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');      // فیلد نام
            $table->string('surname');   // فیلد نام خانوادگی
            $table->timestamps();        // فیلدهای created_at و updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}