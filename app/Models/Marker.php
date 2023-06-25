<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use MatanYadaev\EloquentSpatial\Objects\Point;
use MatanYadaev\EloquentSpatial\SpatialBuilder;
use MatanYadaev\EloquentSpatial\Traits\HasSpatial;

class Marker extends Model
{
    use HasFactory, Upload, HasSpatial, SerializesModels;

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

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
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

    public static function searchable($request, $bool = false)
    {
        if ($bool) {
            $data = Marker::with('area', 'sanitary', 'breed', 'place', 'status', 'event');
        } else {
            $data = Marker::with('area', 'sanitary', 'breed', 'place');
        }
        if (isset($request['area_id']) && $request['area_id'] != 0) {
            $data->where('area_id', $request['area_id']);
        }
        if (isset($request['category_id']) && $request['category_id'] != 0) {
            $data->where('category_id', $request['category_id']);
        }
        if (isset($request['type_id']) && $request['type_id'] != 0) {
            $data->where('type_id', $request['type_id']);
        }
        if (isset($request['breed_id']) && $request['breed_id'] != 0) {
            $data->where('breed_id', $request['breed_id']);
        }
        if (isset($request['sanitary_id']) && $request['sanitary_id'] != 0) {
            $data->where('sanitary_id', $request['sanitary_id']);
        }
        if (isset($request['status_id']) && $request['status_id'] != 0) {
            $data->where('status_id', $request['status_id']);
        }
        return $data;
    }

}
