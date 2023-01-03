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
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id');
            $table->foreign('movie_id',100)
                ->references('id')
                ->on('movies')
                ->onDelete('no action');
            //$table->string('information_id',255)->nullable();
            $table->unsignedBigInteger('information_id');
            $table->foreign('information_id',200)
                ->references('id')
                ->on('movies')
                ->onDelete('no action');
            $table->dateTime('date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
};
