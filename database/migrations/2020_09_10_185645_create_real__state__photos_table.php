<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealStatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real__state__photos', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('real_state_id');

            $table->foreign('real_state_id')->references('id')->on('real__states');

            $table->string('photo');
            $table->boolean('is_thumb');
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
        Schema::dropIfExists('real__state__photos');
    }
}
