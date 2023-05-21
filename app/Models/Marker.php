<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marker extends Model
{
    use HasFactory, Upload;

    protected $fillable = [
        'event_id',
        'sanitary_id',
        'category_id',
        'status_id',
        'type_id',
        'height',
        'diameter',
        'landing_date',
        'user_id',
        'breed_id',
        'age',
        'place_id',
        'geocode',
        'image_url'
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function breed()
    {
        return $this->belongsTo(Breed::class);
    }
    public function sanitary()
    {
        return $this->belongsTo(Sanitary::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
}
