<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToutorialPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('toutorial__parts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('toutorial_id')->references('id')->on('toutorials')->onDelete('cascade');
            $table->string('code',50);
            $table->string('title',255);
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
        Schema::dropIfExists('toutorial__parts');
    }
}
