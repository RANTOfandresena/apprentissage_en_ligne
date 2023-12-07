<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'email',
    ];

    //Un étudiant appartient à un département
    public function departement()
    {
        return $this -> belongsTo(Departement::class);
    }

}

