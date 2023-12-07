<?php

use App\Models\Commentaire;
use App\Models\Contenu_du_cour;
use App\Models\Etudiant;
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
        Schema::create('commentaires', function (Blueprint $table) {
            $table->id();
            $table->string('comentaires');
            $table->timestamps();
        });
        Schema::create('commentaire_contenu_du_cour',function(Blueprint $table){
            $table->foreignIdFor(Commentaire::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Contenu_du_cour::class)->constrained()->cascadeOnDelete();
            $table->primary(['commentaire_id','contenu_du_cour_id']);
        }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaire_contenu_du_cour');
        Schema::dropIfExists('commentaires');
    }
};
