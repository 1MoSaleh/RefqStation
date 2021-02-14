<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRescuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rescue', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('type')->nullable();
            $table->text('details')->nullable();
            $table->string('need_degree')->nullable();
            $table->string('healthStatues')->nullable();
            $table->string('violent')->nullable();
            $table->string('statues')->nullable();
            // refers to the user who made the order
            $table->unsignedInteger('user_id')->nullable();
            // refers to admin who closed the order
            $table->unsignedInteger('admin_id')->nullable();
            // to get contact info
            $table->unsignedInteger('contact_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rescue');
    }
}
