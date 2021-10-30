<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projet;

class Realisation extends Model
{
    use HasFactory;
    protected $fillable = [
        'statut',
    ];
    public function projet(){
        return $this->BelongsTo(Projet::class);
    }
}
