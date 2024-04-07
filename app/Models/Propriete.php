<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propriete extends Model
{
    use HasFactory;

    protected $fillable = [

        'title',
        'description',
        'surface',
        'pieces',
        'chambres',
        'etage',
        'prix',
        'ville',
        'code_postal',
        'adresse',
        'vendu',
    ];
}
