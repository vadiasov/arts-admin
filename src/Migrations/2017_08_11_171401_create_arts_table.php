<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arts', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('album_or_track', ['album', 'track']);
            $table->integer('album_id')->unsigned();
            $table->foreign('album_id')
                ->references('id')->on('albums')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->integer('track_id')->unsigned()->nullable();
            $table->foreign('track_id')
                ->references('id')->on('tracks')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->tinyInteger('order')->nullable();
            $table->tinyInteger('cover');
            $table->string('file', 50);
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
        Schema::dropIfExists('arts');
    }
}
