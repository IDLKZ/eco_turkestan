<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\SpatialBuilder;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

class Marker extends Model
{
    use HasFactory, Upload;
    use HasSpatial;
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
        'point',
        'geocode',
        'image_url'
    ];

    protected $casts = [
        'point' => Point::class,
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
    public static function query(): SpatialBuilder
    {
        return parent::query();
    }


}
