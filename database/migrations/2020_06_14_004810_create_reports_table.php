<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            // type of input e.g. contact .. report ... etc
            $table->string('type')->nullable();
            // reason if contact ? suggestion .. report .. etc
            $table->string('reason')->nullable();
            // title for suggestions...etc
            $table->string('title')->nullable();
            $table->text('details')->nullable();
            $table->string('contact')->nullable();
            $table->string('statues')->nullable();
            $table->unsignedInteger('sender_id')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
