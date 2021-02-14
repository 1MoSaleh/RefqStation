<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdoptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoption', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            // type of order... for example: pet .. food.. accessories ...etc
            $table->string("type")->nullable();
            $table->text('details')->nullable();
            $table->text('conditions')->nullable();
            $table->string('statues')->nullable();
            $table->string('acceptTerms')->nullable();
            // $table->unsignedInteger('numReports')->nullable();
            // referce to the user who made the order
            $table->unsignedInteger('user_id')->nullable();
            // referce to admin who closed the order
            $table->unsignedInteger('admin_id')->nullable();
            // to get pet info
            $table->unsignedInteger('pet_id');
           // to get contact info
            $table->unsignedInteger('contact_id');


            // $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
            //$table->foreign('contact_id')->references('id')->on('order_contact')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adoption');
    }
}
