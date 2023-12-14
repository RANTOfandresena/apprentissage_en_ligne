<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenu_du_cour extends Model
{
    use HasFactory;

    protected $fillable = [
        'contenue',
        'sujet_examen',
        'niveau'
    ];
    public function commentaire()
    {
        return $this->belongsToMany(Commentaire::class);
    }
}
