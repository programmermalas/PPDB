<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('learner_id');
            $table->string('street', 50);
            $table->integer('neighborhood_association');
            $table->integer('citizens_association');
            $table->string('village', 50);
            $table->string('sub_district', 50);
            $table->string('postal_code', 10);
            $table->enum('residence', ['parents', 'guardian', 'boarding_house', 'dormitory', 'orphanage', 'other']);
            $table->enum('transportation', ['foot', 'private_transportation', 'public_transportation', 'school_transportation', 'train', 'taxibike', 'horse', 'boat', 'other']);
            $table->string('number_prosperous_family_card', 25)->nullable();
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
        Schema::dropIfExists('addresses');
    }
}
