<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePriodicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priodics', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('learner_id');
            $table->integer('height');
            $table->integer('weight');
            $table->integer('distance_from_home');
            $table->integer('kilometer');
            $table->time('time');
            $table->timestamps();

            $table->foreign('learner_id')
                ->references('id')
                ->on('learners')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('priodics');
    }
}
