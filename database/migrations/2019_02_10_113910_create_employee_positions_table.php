<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeePositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_positions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('emp_dept_id');
            $table->foreign('emp_dept_id')
                ->references('id')->on('employee_departments')
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
        Schema::dropIfExists('employee_positions');
        Schema::table('employee_positions', function (Blueprint $table) {
            $table->dropForeign('employee_positions_emp_dept_id_foreign');
        });
    }
}
