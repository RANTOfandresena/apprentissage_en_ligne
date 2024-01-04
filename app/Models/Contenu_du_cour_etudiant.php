<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contenu_du_cour_etudiant extends Model
{
    use HasFactory;
    protected $table='contenu_du_cour_etudiant';
    protected $fillable=[
        'contenu_du_cour_id',
        'etudiant_id',
        'reponse_examen',
        'note',
        'progression'
    ];
}
