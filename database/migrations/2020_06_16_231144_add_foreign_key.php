<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKey extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('users', function (Blueprint $table) {
            //
            $table->foreign('contact_id')->references('id')->on('contact')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::table('articles', function (Blueprint $table) {
            //
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('adoption', function (Blueprint $table) {
            //
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('contact_id')->references('id')->on('contact')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::table('rescue', function (Blueprint $table) {
            //
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('contact_id')->references('id')->on('contact')->onDelete('cascade')->onUpdate('cascade');

        });
        Schema::table('lost', function (Blueprint $table) {
            //
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('admin_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('contact_id')->references('id')->on('contact')->onDelete('cascade')->onUpdate('cascade');

        });
        Schema::table('media', function (Blueprint $table) {
            //
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('rescue_id')->references('id')->on('rescue')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('adoption_id')->references('id')->on('adoption')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lost_id')->references('id')->on('lost')->onDelete('cascade')->onUpdate('cascade');

        });

        Schema::table('reports', function (Blueprint $table) {
            //
            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('article_id')->references('id')->on('articles')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('rescue_id')->references('id')->on('rescue')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('adoption_id')->references('id')->on('adoption')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('lost_id')->references('id')->on('lost')->onDelete('cascade')->onUpdate('cascade');

        });

    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign(['contact_id']);
        });
        Schema::table('articles', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);
            $table->dropForeign(['admin_id']);
        });

        Schema::table('adoption', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);
            $table->dropForeign(['admin_id']);
            $table->dropForeign(['pet_id']);
            $table->dropForeign(['contact_id']);

        });

        Schema::table('rescue', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);
            $table->dropForeign(['admin_id']);
            $table->dropForeign(['contact_id']);
        });
        Schema::table('lost', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);
            $table->dropForeign(['admin_id']);
            $table->dropForeign(['contact_id']);
        });

        Schema::table('media', function (Blueprint $table) {
            //
            $table->dropForeign(['user_id']);
            $table->dropForeign(['rescue_id']);
            $table->dropForeign(['article_id']);
            $table->dropForeign(['adoption_id']);
            $table->dropForeign(['lost_id']);

        });

        Schema::table('reports', function (Blueprint $table) {
            //
            $table->dropForeign(['sender_id']);
            $table->dropForeign(['user_id']);
            $table->dropForeign(['rescue_id']);
            $table->dropForeign(['article_id']);
            $table->dropForeign(['adoption_id']);
            $table->dropForeign(['lost_id']);

        });

    }
}
