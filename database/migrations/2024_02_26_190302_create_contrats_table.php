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
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->string('numero')->unique();
            $table->string('contrat')->unique();
            $table->string('ref_contrat')->unique();
            $table->string('date_de_planification');
            $table->string('info_compl_localite');
            $table->string('demarre');
            $table->string('date_de_remise_site');
            $table->string('date_de_demarrage');
            $table->string('niv_exe_phy_date_visit');
            $table->string('niv_exe_fce_date_visit');
            $table->string('montant_desc_deja_pay');
            $table->string('montant_desc_a_pay');
            $table->string('date_achev_pro');
            $table->string('date_achev_reel');
            $table->string('date_recept_tech');
            $table->string('lien_pv4');
            $table->string('pv4');
            $table->string('date_recept_prov_chantier');
            $table->string('lien_pv5');
            $table->string('pv5');
            $table->string('date_recept_def_chantier');
            $table->string('lien_pv6');
            $table->string('pv6');
            $table->string('duree_ret_accus');
            $table->string('cause_retard');
            $table->string('solution');
            $table->string('appro_achantier');
            $table->string('qualite_travaux');
            $table->string('difficulte');
            $table->string('autre_diff');
            $table->string('attachement1');
            $table->string('date_attach1');
            $table->string('montant_attach1');
            $table->string('lien_pv1');
            $table->string('pv1');
            $table->string('attachement2');
            $table->string('date_attach2');
            $table->string('montant_attach2');
            $table->string('lien_pv2');
            $table->string('pv2');
            $table->string('attachement3');
            $table->string('date_attach3');
            $table->string('montant_attach3');
            $table->string('lien_pv3');
            $table->string('pv3');
            $table->string('nbre_empl_per');
            $table->string('nbre_empl_temp');
            $table->string('annee_execution');
            $table->string('personne_en_charge');
            $table->string('localite');
            $table->string('entreprise');
            $table->string('phone');
            $table->string('etat_chantier');

            $table->string('coordonnéeGPS');
            $table->string('mode_execution');


            $table->unsignedBigInteger('activite_id');

            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('activite_id')
            ->references('id')
            ->on('activites')
            ->onDelete('cascade');



            $table->foreign('user_id')
            ->references('id')
            ->on('users')
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
        Schema::dropIfExists('contrats');
    }
};
