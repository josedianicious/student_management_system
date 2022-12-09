<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_marks', function (Blueprint $table) {
            $table->bigIncrements('mark_id');
            $table->unsignedBigInteger('student_id');
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->double('maths_mark',4,2);
            $table->double('science_mark',4,2);
            $table->double('history_mark',4,2);
            $table->unsignedBigInteger('term_id');
            $table->foreign('term_id')->references('term_id')->on('terms');
            $table->double('total_mark',5,2);
            $table->softDeletes();
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
        Schema::dropIfExists('student_marks');
    }
};
