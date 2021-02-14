<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {

            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->string('title');
            $table->text('content');
            // type of article : care ... info ... etc
            $table->string('type')->nullable();
           //  $table->string('coverImage')->nullable();
           // $table->string('image')->nullable();
            $table->string('statues')->nullable();
            $table->unsignedInteger('likes')->nullable();
            $table->integer('dislikes')->nullable();
            // it could be in another table with reason of the report << we make another table
           // $table->unsignedInteger('numReports')->nullable();
            // the user who made the article
            $table->unsignedInteger('user_id');
            // the admin who close the article
            $table->unsignedInteger('admin_id')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
