<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
          // we add increments
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            // we add soft delete
            $table->softDeletes();
            // we add more info
            $table->string('role')->nullable();
            $table->string('bio')->nullable();
            $table->string('statues')->nullable();
            $table->string('type')->nullable();
            // if he member of organization
            $table->string('organizationName')->nullable();
            $table->unsignedInteger('contact_id')->nullable();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
