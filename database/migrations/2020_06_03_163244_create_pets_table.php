<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            // referce to type of pet like dog .. cat ...etc  #for now er have only cats#
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('gender' , '10');
            $table->string('family')->nullable();
            $table->string('age')->nullable();
            $table->string('castration')->nullable();
            $table->string('vaccinated')->nullable();
            $table->string('litterBox')->nullable();
            $table->string('behavior')->nullable();
            $table->string('reason')->nullable();
            $table->string('healthStatues')->nullable();
            // maybe will be there more attributes
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets');
    }
}
