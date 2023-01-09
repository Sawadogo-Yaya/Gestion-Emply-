<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $fillable = [
        'pays_id',
        'ville_id',
        'departement_id',
        'Nom',
        'Prenom',
        'adresse',
        'zip_code',
        'date_naissance',
        'date_emboche'
    ];

    public function pays(){
        return  $this->belongsTo(Pays::class);
    }
    public function departement(){
        return  $this->belongsTo(Departement::class);
    }
    public function ville(){
        return  $this->belongsTo(ville::class);
    }
}
