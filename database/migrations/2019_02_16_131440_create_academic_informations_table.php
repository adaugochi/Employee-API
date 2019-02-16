<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademicInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academic_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('program_name');
            $table->string('school_name');
            $table->string('school_address');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('graduation_year');
            $table->string('reason_for_leave')->nullable();
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
        Schema::dropIfExists('academic_informations');
    }
}
