<?php

use App\Models\Commentaire;
use App\Models\Proffesseur;
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
        Schema::create('commentaire_proffesseur',function(Blueprint $table){
            $table->foreignIdFor(Commentaire::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Proffesseur::class)->constrained()->cascadeOnDelete();
            $table->primary(['commentaire_id','proffesseur_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commentaire_proffesseur');
    }
};
