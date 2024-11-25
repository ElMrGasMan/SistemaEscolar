<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    
    public function up()
        {
            Schema::create('courses', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->unsignedBigInteger('subject_id');
                $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
                $table->timestamps();
            });
        }
        public function down()
        {
            Schema::dropIfExists('courses');
        }


}
