<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id', 100)->primary();
        });

        Schema::create('urls', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->integer('hit');
            $table->string('url', 256);
            $table->uuid('short_url')->unique();
            $table->string('user_id', 100);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('urls');
        Schema::dropIfExists('users');
    }
}
