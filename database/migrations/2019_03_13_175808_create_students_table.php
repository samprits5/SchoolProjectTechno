<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sid',10);
            $table->string('name',50);
            $table->string('email',50)->unique();
            $table->string('address', 255);
            $table->string('phone',12);
            $table->string('password',50);
            $table->string('class',5);
            $table->string('section',5);
            $table->string('guardian_name', 50);
            $table->string('guardian_phone',12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
