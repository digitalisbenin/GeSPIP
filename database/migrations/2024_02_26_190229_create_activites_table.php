<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activites', function (Blueprint $table) {
            $table->id();
            $table->string('titre_activite');
            $table->string('cout_activite');
            $table->string('dure_execution');
            $table->unsignedBigInteger('nature_activite_id');
            $table->unsignedBigInteger('mode_execution_id');
            $table->unsignedBigInteger('projet_id');
            $table->unsignedBigInteger('commune_id');
            $table->unsignedBigInteger('entreprise_id');
            $table->timestamps();
            $table->foreign('nature_activite_id')
            ->references('id')
            ->on('nature_activites')
            ->onDelete('cascade');

            $table->foreign('mode_execution_id')
            ->references('id')
            ->on('mode_executions')
            ->onDelete('cascade');

            $table->foreign('projet_id')
            ->references('id')
            ->on('projets')
            ->onDelete('cascade');


            $table->foreign('entreprise_id')
            ->references('id')
            ->on('entreprises')
            ->onDelete('cascade');

            $table->foreign('commune_id')
            ->references('id')
            ->on('communes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activites');
    }
};
