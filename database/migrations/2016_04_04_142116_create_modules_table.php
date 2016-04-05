<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->nullable()->unsigned();
            $table->enum('type', ['image', 'youtube', 'slideshow'])->default('image');
            $table->string('video')->nullable();
            $table->string('url_to')->nullable();
            $table->string('caption')->nullable();
            $table->timestamps();

            $table->foreign('page_id')
                ->references('id')->on('pages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('modules');
    }
}
