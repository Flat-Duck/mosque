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
            $table->increments('id');
            $table->bigInteger('national_number')->nullable();
            $table->integer('enrolment_number')->nullable()->unique();
            $table->string('name');
            $table->date('date_birth');
            $table->date('date_join')->nullable();
            $table->text('address');
            $table->string('phone');
            $table->string('qualification');
            $table->text('notes');
            $table->string('passport');
            $table->integer('nationality_id')->unsigned()->index();
            $table->integer('gender_id')->unsigned()->index();
            $table->integer('status_id')->unsigned()->index();
            $table->integer('level_id')->unsigned()->index();
            $table->integer('mosque_id')->unsigned()->index();
            $table->integer('course_id')->unsigned()->index();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('nationality_id')->references('id')->on('nationalities');
            $table->foreign('gender_id')->references('id')->on('genders');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->foreign('level_id')->references('id')->on('levels');
            $table->foreign('mosque_id')->references('id')->on('mosques');
            $table->foreign('course_id')->references('id')->on('courses');
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
