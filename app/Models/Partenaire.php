<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Don;
use App\Models\Mission;
use App\Models\Projet;

class Partenaire extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'pays',
        'adresse',
    ];
    protected $table = "partenaires";
    public function dons(){
        return $this->hasMany(Don::class);
    }
    public function missions(){
        return $this->hasMany(Mission::class);
    }
    public function projets(){
        return $this->hasMany(Projet::class);
    }
    public function conventions(){
        return $this->hasMany(Convention::class);
    }
}
