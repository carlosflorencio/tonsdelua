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
            $table->string('description');
            $table->integer('page_id')->nullable()->unsigned();
            $table->enum('type', ['imagem', 'youtube', 'slideshow'])->default('imagem');
            $table->string('youtube')->nullable();
            $table->integer('url_to')->nullable()->unsigned();
            $table->string('caption')->nullable();
            $table->timestamps();

            $table->foreign('page_id')
                ->references('id')->on('pages');

            $table->foreign('url_to')
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
