<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmploymentInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employment_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->string('employer_name');
            $table->string('employer_email')->unique()->nullable();
            $table->string('position');
            $table->string('start_date');
            $table->string('end_date');
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
        Schema::dropIfExists('employment_informations');
    }
}
