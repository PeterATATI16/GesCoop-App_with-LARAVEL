<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Realisation;

class Projet extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'cout',
        'date_initiation',
        'partenaire_id',
        'statut',
    ];
    public function realisations()
    {
        return $this->hasMany(Realisation::class);
    }
    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }
}
