<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassementTarifaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classement_tarifaire', function (Blueprint $table) {
            $table->id();
            $table->string('file_nom')->nullable();
            $table->string('code_tarifaire', 20)->nullable();
            $table->string('conclusion')->nullable();
            $table->dateTime('date_decision')->nullable();
            $table->dateTime('date_diffusion')->nullable();
            $table->dateTime('date_validite')->nullable();
            $table->string('decision')->nullable();
            $table->text('designation')->nullable();
            $table->enum('statut', ['draft', 'published', 'archived'])->default('draft');
            $table->binary('circulaire')->nullable();
            $table->timestamps();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classement_tarifaire');
    }
}
