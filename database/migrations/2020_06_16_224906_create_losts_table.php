<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lost', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('type')->nullable();
            $table->date('dateOfLost')->nullable();
            $table->text('details')->nullable();
            $table->string('name')->nullable();
            $table->string('age')->nullable();
            $table->string('gender')->nullable();
            $table->string('catDetails')->nullable();
            $table->string('statues')->nullable();

            // referce to the user who made the order
            $table->unsignedInteger('user_id')->nullable();
            // referce to admin who closed the order
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
        Schema::dropIfExists('losts');
    }
}
