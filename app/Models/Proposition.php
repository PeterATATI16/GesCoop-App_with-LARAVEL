<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposition extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $fillable = [
        'created_at',
        'updated_at',
    ];
}
