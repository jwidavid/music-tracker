<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAlbumTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('album', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('band_id')->unsigned();
            $table->string('name');
            $table->date('recorded_date')->nullable();
            $table->date('release_date')->nullable();
            $table->tinyInteger('number_of_tracks')->nullable()->unsigned();
            $table->string('label', 32)->nullable();
            $table->string('producer', 32)->nullable();
            $table->string('genre', 21)->nullable();
            $table->timestamps();

            $table->foreign('band_id')
                ->references('id')
                ->on('band')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('album');
    }
}
