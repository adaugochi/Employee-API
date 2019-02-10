<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_code');
            $table->unsignedInteger('emp_position_id');
            $table->foreign('emp_position_id')
                  ->references('id')->on('employee_position')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->unsignedInteger('emp_type_id');
            $table->foreign('emp_type_id')
                  ->references('id')->on('employee_type')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('emp_firstname');
            $table->string('emp_middle_name');
            $table->string('emp_surname');
            $table->string('emp_photo');
            $table->string('emp_gender');
            $table->string('emp_dob');
            $table->string('emp_nationality');
            $table->string('emp_phone_number');
            $table->string('emp_email');
            $table->string('emp_marital_status');
            $table->string('emp_religion');
            $table->string('branch_code');
            $table->string('school_code');
            $table->text('raw')->nullable();
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
        Schema::dropIfExists('employee_information');
        Schema::table('employee_information', function (Blueprint $table) {
            $table->dropForeign('employee_information_emp_position_id_foreign');
        });
        Schema::table('employee_information', function (Blueprint $table) {
            $table->dropForeign('employee_information_emp_type_id_foreign');
        });
    }
}

