<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;
use App\Models\Picture;
use Illuminate\Database\Eloquent\SoftDeletes;

class Propriete extends Model
{
    use HasFactory;
    use SoftDeletes;

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

    public function pictures(): HasMany
    {
        return $this->hasMany(Picture::class);
    }

    //***** */


    /**
     * @param UploadedFile[] $files
     */
    public function attachedFiles(array $files)
    {
        $pictures = [];
        foreach ($files as $file) {
            if ($file->getError()) {
                continue;
            }
            $filename =$file->store('proprietes/' . $this->id, 'public');
            $pictures[] = [
                'filename' => $filename
            ];
        }
        if (count($pictures) > 0) {
            $this->pictures()->createMany($pictures);
        }
    }

    public function getPicture(): ?Picture
    {
        return $this->picture[0] ?? null;
    }

//**** */

    public function scopeAvailable(Builder $builder): Builder
    {
        return $builder->where('vendu', false);
    }

    public function scopeRecent(Builder $builder): Builder
    {
        return $builder->orderBy('created_at', 'desc');
    }
        
}
