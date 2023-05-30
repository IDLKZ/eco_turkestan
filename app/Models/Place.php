<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Place extends Model
{
    use HasFactory;
    use Upload;

    protected $fillable = [
        'area_id',
        'bg_color',
        'title_ru',
        'title_kz',
        'description_ru',
        'description_kz',
        'image_url',
        'geocode'
    ];


    public function area(): BelongsTo{
        return $this->belongsTo(Area::class);
    }

    public function markers(): HasMany
    {
        return $this->hasMany(Marker::class, 'place_id', 'id');
    }
}
