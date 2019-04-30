<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('action');
            $table->enum('target', ['thread', 'article']);
            $table->enum('prefix', ['t-create', 't-answer', 'a-create', 'a-update']);
            $table->integer('thread_id')->nullable();
            $table->integer('article_id')->nullable();
            $table->integer('admin_id')->nullable();
            $table->integer('doctor_id')->nullable();
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('logs');
    }
}
