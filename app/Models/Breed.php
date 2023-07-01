<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory, Upload;

    protected $fillable = ['title_ru', 'title_kz','image_url', 'coefficient', 'status'];

    public function markers()
    {
        return $this->hasMany(Marker::class, 'breed_id', 'id');
    }
}
