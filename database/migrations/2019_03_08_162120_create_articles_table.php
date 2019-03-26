<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('category', ['penyakit', 'obat', 'hidup-sehat', 'keluarga', 'kesehatan']);
            $table->enum('writer', ['Admin', 'Doctor'])->nullable();
            $table->integer('writer_id')->nullable();
            $table->string('title');
            $table->mediumText('content');
            $table->string('cover_image')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
