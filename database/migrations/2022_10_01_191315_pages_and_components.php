<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PagesAndComponents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages_and_components', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('page_id');
            $table->unsignedBigInteger('component_id');

            $table->foreign('page_id')->references('id')->on('pages');
            $table->foreign('component_id')->references('id')->on('components');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages_and_components');
    }
}
