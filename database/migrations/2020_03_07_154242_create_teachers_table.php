<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->date('date_birth');
            $table->integer('family_booklet_number');
            $table->boolean('designation');
            $table->boolean('description');
            $table->date('date_designation');
            $table->text('address');
            $table->string('bank');
            $table->string('branch');
            $table->string('account');
            $table->string('phone');
            $table->string('email');
            $table->boolean('certificate');
            $table->date('date_certificate');
            $table->string('certificate_place');
            $table->integer('national_number');
            $table->integer('mosque_id')->unsigned()->index();
            $table->integer('nationality_id')->unsigned()->index();
            $table->integer('gender_id')->unsigned()->index();
            $table->integer('status_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('mosque_id')->references('id')->on('mosques');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('status_id')->references('id')->on('statuses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
