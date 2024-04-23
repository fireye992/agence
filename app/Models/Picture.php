<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename', // Assurez-vous que ceci correspond aux champs de votre base de données
        'propriete_id'  // Ce champ est supposé être la clé étrangère liant 'Picture' à 'Propriete'
    ];

    /**
     * Définit la relation inverse avec le modèle Propriete.
     */
    public function propriete()
    {
        return $this->belongsTo(Propriete::class);
    }
}
