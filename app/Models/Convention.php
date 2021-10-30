<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convention extends Model
{
    use HasFactory;
    protected $fillable = [
        'partenaire_id',
        'domaines',
        'objet',
        'type',
        'date_sign',
        'validite',
        'perspectives',
        'statut',
    ];

    public function partenaire()
    {
        return $this->belongsTo(Partenaire::class);
    }
}
