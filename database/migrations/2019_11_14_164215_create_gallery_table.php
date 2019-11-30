<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalleryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gallery', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('preview');
            $table->string('image');
            $table->string('path');
            $table->boolean('private')->default(1);
            
            $table->unsignedBigInteger('user_id');
            
            $table->timestamps();
            
            $table->foreign('user_id')              #foreign создает внешний ключ
                ->references('id')->on('users')
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
        Schema::dropIfExists('gallery');
    }
}
