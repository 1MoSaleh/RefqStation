<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('src1');
            $table->string('src2')->nullable();
            // type of input e.g. coverImage .. image .. video
            $table->string('type')->nullable();
            $table->string('path')->nullable();
            $table->string('name')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('adoption_id')->nullable();
            $table->unsignedInteger('rescue_id')->nullable();
            $table->unsignedInteger('article_id')->nullable();
            $table->unsignedInteger('lost_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
    }
}
