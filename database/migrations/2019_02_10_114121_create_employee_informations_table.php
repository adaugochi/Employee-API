<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('emp_code');
            $table->unsignedInteger('emp_position_id');
            $table->foreign('emp_position_id')
                  ->references('id')->on('employee_positions')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->unsignedInteger('emp_type_id');
            $table->foreign('emp_type_id')
                  ->references('id')->on('employee_types')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('emp_first_name');
            $table->string('emp_middle_name');
            $table->string('emp_surname');
            $table->string('emp_photo');
            $table->string('emp_gender');
            $table->string('emp_dob');
            $table->string('emp_nationality');
            $table->string('emp_phone_number');
            $table->string('emp_email')->unique();
            $table->string('emp_marital_status');
            $table->string('emp_religion');
            $table->string('reason_to_leave')->nullable();
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
        Schema::dropIfExists('employee_informations');
        Schema::table('employee_informations', function (Blueprint $table) {
            $table->dropForeign('employee_informations_emp_position_id_foreign');
        });
        Schema::table('employee_informations', function (Blueprint $table) {
            $table->dropForeign('employee_informations_emp_type_id_foreign');
        });
    }
}

