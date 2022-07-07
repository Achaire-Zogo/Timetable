<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->String("nom_classe")->unique();
            $table->Integer("capacite_classe");
            $table->unsignedBigInteger('id_niveau');
            $table->foreign('id_niveau')
                ->references('id')
                ->on('niveaux')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('id_specialite');
            $table->foreign('id_specialite')
                ->references('id')
                ->on('specialites')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('id_filiere');
            $table->foreign('id_filiere')
                ->references('id')
                ->on('filieres')
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
        Schema::dropIfExists('classes');
    }
}
