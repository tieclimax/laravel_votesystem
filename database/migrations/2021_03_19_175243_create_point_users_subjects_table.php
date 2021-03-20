<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePointUsersSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('point_users_subjects', function (Blueprint $table) {
            $table->integer('st_id')->unsigned();
            $table->integer('sj_id')->unsigned();
            $table->integer('point')->unsigned();
            $table->foreign('st_id')->references('stid')->on('students')
                ->onDelete('cascade');
            $table->foreign('sj_id')->references('sjid')->on('subjects')
                ->onDelete('cascade');
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
        Schema::dropIfExists('point_users_subjects');
    }
}
