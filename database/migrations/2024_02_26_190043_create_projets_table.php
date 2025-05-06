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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->string('titre_projet');
            $table->string('intituler_projet');
            $table->string('cout_global');
            $table->unsignedBigInteger('type_projet_id')->nullable();
            $table->timestamps();
            $table->foreign('type_projet_id')
            ->references('id')
            ->on('type_projets')
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
        Schema::dropIfExists('projets');
    }
};
