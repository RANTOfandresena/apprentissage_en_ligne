<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matiere extends Model
{
    use HasFactory;

    protected $fillable = [
        'matiere',
        'categorie_id',
        'proffesseur_id',
        'description'
    ];

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function proffesseur()
    {
        return $this->belongsTo(Proffesseur::class);
    }

    public function contenu_du_cours()
    {
        return $this->belongsToMany(Contenu_du_cour::class);
    }
    public function departement()
    {
        return $this->belongsToMany(Departement::class);
    }
}
