<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\partenaire;

class Don extends Model
{
    use HasFactory;
    protected $fillable = [
        'statut',
    ];
    public function partenaire(){
        return $this->belongsTo(partenaire::class);
 }
}
