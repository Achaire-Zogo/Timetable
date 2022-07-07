<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniteEnseignementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unite_enseignements', function (Blueprint $table) {
            $table->id();
            $table->String('code_ue')->unique();
            $table->String('nom_ue')->unique();
          
                $table->unsignedBigInteger('id_specialite');

                $table->foreign('id_specialite')
                ->references('id')
                ->on('specialites')
                ->onDelete('cascade')
                ->onUpdate('cascade');
                $table->unsignedBigInteger('id_classe');

                $table->foreign('id_classe')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('unite_enseignements');
    }
}
