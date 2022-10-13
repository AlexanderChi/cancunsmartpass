<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $dates = ['fecha_publicacion'];
    protected $dates = ['fecha_modificacion'];

    protected static function boot(){
        parent::boot();

        static::deleting(function($tour){
            $tour->destinations()->detach();
            $tour->photos->each->delete();
        });
    }

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function destinations(){
        return $this->belongsToMany(Destination::class);
    }

    public function typechange(){
        return $this->belongsTo(TypeChange::class, 'tipo_cambios_id');
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
