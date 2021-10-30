<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'fonction',
        'mode_transport',
        'frais_transport',
        'frais_sejour',
        'date_depart',
        'date_retour',
        'statut',
    ];
    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }
}
