<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groupes', function (Blueprint $table) {
            $table->id();
            $table->String("nom_groupe");
                $table->unsignedBigInteger('id_classe');
            $table->foreign('id_classe')
                ->references('id')
                ->on('classes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->Integer("nb_etudiants");
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
        Schema::dropIfExists('groupes');
    }
}
