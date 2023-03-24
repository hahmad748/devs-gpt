<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\File;


class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('chatgpt_logs');
        Schema::create('chatgpt_logs', function (Blueprint $table) {
            $table->id();
            $table->string('request')->nullable();
            $table->string('response')->nullable();
            $table->string('tokens')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('ip')->nullable();
            $table->longText('meta')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('chatgpt_logs');
    }

  
}
