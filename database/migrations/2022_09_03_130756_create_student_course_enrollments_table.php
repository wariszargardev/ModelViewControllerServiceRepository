<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentCourseEnrollmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_course_enrollments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('students_id');
            $table->unsignedBigInteger('courses_id');
            $table->unsignedBigInteger('enrolled_by_user_id');
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
        Schema::dropIfExists('student_course_enrollments');
    }
}
