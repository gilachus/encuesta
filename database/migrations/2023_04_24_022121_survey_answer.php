<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SurveyAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_answers', function (Blueprint $table) {
            $table->id();
            $table->string('student_email');
            $table->string('student_code');
            $table->string('student_name');
            $table->string('faculty');
            $table->string('program');
            $table->unsignedBigInteger('funniest_professor_id');
            $table->unsignedBigInteger('most_demading_professor_id');
            $table->unsignedBigInteger('most_inspiring_professor_id');
            $table->unsignedBigInteger('most_supportive_professor_id');
            $table->unsignedBigInteger('most_innovative_professor_id');
            $table->timestamps();

            $table->foreign('funniest_professor_id')->references('id')->on('professors');
            $table->foreign('most_demading_professor_id')->references('id')->on('professors');
            $table->foreign('most_inspiring_professor_id')->references('id')->on('professors');
            $table->foreign('most_supportive_professor_id')->references('id')->on('professors');
            $table->foreign('most_innovative_professor_id')->references('id')->on('professors');
        });
    }

    public function down()
    {
        Schema::dropIfExists('survey_answers');
    }
}
