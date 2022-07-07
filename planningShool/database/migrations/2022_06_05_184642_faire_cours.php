<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaireCoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faire_cours', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_ue');
            $table->foreign('id_ue')
                ->references('id')
                ->on('unite_enseignements')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->unsignedBigInteger('id_salle');
            $table->foreign('id_salle')
                ->references('id')
                ->on('salles')
                ->onDelete('cascade')
                ->onUpdate('cascade');



                $table->unsignedBigInteger('id_enseignant');
            $table->foreign('id_enseignant')
                ->references('id')
                ->on('enseignants')
                ->onDelete('cascade')
                ->onUpdate('cascade');


           
   $table->unsignedBigInteger('id_type');
            $table->foreign('id_type')
                ->references('id')
                ->on('types_cours')
                ->onDelete('cascade')
                ->onUpdate('cascade');



            $table->unsignedBigInteger('id_groupe');
            $table->foreign('id_groupe')
                ->references('id')
                ->on('groupes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
           


            $table->unsignedBigInteger('id_jour');
            $table->foreign('id_jour')
                ->references('id')
                ->on('jours')
                ->onDelete('cascade')
                ->onUpdate('cascade');
      


            $table->unsignedBigInteger('id_heure');
            $table->foreign('id_heure')
                ->references('id')
                ->on('heures')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            
                $table->Integer('visible_grp'); 
                $table->Integer('published');     
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
        Schema::dropIfExists('faire_cours');
    }
}
