<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;


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

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug(): string
     {
        return Str::slug($this->title);
    }
}
