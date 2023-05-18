<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Area extends Model
{
    use HasFactory;
    use Upload;

    protected $fillable = [
        'title_ru',
        'title_kz',
        'description_ru',
        'description_kz',
        'image_url',
        'geocode',
        'bg_color'
    ];


    public function places():HasMany{
        return $this->hasMany(Place::class,"area_id","id");
    }
}
