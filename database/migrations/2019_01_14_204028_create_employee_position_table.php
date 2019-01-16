<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_position', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('emp_dept_id');
            $table->foreign('emp_dept_id')
                  ->references('id')->on('employee_position')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
            $table->string('emp_position_name');
            $table->string('emp_position_code');
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
        Schema::dropIfExists('employee_position');
        Schema::table('employee_position', function (Blueprint $table) {
            $table->dropForeign('employee_position_emp_dept_id_foreign');
        });
    }
}
