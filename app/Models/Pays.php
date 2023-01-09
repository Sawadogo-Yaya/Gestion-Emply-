<?php

namespace App\Models;

use App\Models\Ville;
use App\Models\Employe;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pays extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_pays',
        'Libelle'
    ];

    public function employe(){
        return  $this->hasMany(Employe::class);
    }
   public function ville(){
        return  $this->hasMany(Ville::class);
    }
   
}
