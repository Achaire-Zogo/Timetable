<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiveauxFilieresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('niveaux_filieres', function (Blueprint $table) {
            $table->id();

 
            $table->unsignedBigInteger('id_filiere');
            $table->foreign('id_filiere')
                ->references('id')
                ->on('filieres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
         $table->unsignedBigInteger('id_niveaux');
                $table->foreign('id_niveaux')
                    ->references('id')
                    ->on('niveaux')
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
        Schema::dropIfExists('niveaux_filieres');
    }
}
