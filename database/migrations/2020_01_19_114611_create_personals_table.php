<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('learner_id');
            $table->string('nick', 25);
            $table->enum('gender',  ['boy', 'girl']);
            $table->integer('number_of_siblings');
            $table->string('number_family_card', 100);
            $table->string('birth_certificate_registration', 50);
            $table->enum('religion', ['islam', 'kristen', 'hindu', 'budha']);
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
        Schema::dropIfExists('personals');
    }
}
