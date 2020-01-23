<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('learner_id');
            $table->integer('number_of_siblings');
            $table->boolean('kps_pkh');
            $table->string('no_kps_pkh', 25)->nullable();
            $table->boolean('invited_from_school');
            $table->boolean('kip');
            $table->string('no_kip', 25)->nullable();
            $table->string('name_of_kip', 25)->nullable();
            $table->boolean('physical_kip_card');
            $table->enum('reason', ['pkh_kps_kip', 'bsm', 'orphange', 'dampal', 'drop_out', 'poor', 'conflict', 'convicted', 'other'])->nullable();
            $table->string('bank', 50)->nullable();
            $table->string('account_number', 25)->nullable();
            $table->string('account_name', 50)->nullable();
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
        Schema::dropIfExists('details');
    }
}
