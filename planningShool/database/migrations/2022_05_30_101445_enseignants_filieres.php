<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EnseignantsFilieres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('enseignants_filieres', function (Blueprint $table) {
            $table->id();

 
            $table->unsignedBigInteger('id_filiere');
            $table->foreign('id_filiere')
                ->references('id')
                ->on('filieres')
                ->onDelete('cascade')
                ->onUpdate('cascade');
         $table->unsignedBigInteger('id_enseignant');
                $table->foreign('id_enseignant')
                    ->references('id')
                    ->on('enseignants')
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
        //
        Schema::dropIfExists('enseignants_filieres');
    }
}
