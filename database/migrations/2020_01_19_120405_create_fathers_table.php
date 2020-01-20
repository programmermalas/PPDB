<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fathers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('learner_id');
            $table->string('name', 25)->nullable();
            $table->string('nik', 50)->nullable();
            $table->date('year_of_birth')->nullable();
            $table->string('last_study', 10)->nullable();
            $table->string('profession', 25)->nullable();
            $table->integer('income')->nullable();
            $table->string('phone', 15)->nullable();
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
        Schema::dropIfExists('fathers');
    }
}
