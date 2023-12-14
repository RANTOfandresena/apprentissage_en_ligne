<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'comentaires'
    ];
    public function contenu_du_cours(){
        return $this->belongsToMany(Contenu_du_cour::class);
    }
}
