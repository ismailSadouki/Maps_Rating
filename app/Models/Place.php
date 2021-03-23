<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    public function getImageAttribute($image){
        return asset('storage/images/'.$image);
    }

    public function scopeSearch($query,$request)
    {
        if($request->category){
            $query->whereCategory_id($request->category);
        }

        if($request->address){
            $query->where('address', 'LIKE', '%'.$request->address.'%');
        }

        return $query;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
