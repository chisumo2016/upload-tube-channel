<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    //

    protected  $fillable = [

        'name',
        'slug',
        'description',
        'image_filaname',
    ];

    public  function user()
    {
        return $this->belongsTo(User::class);
    }

    //Get route key name
    public  function  getRouteKeyName()
    {
        return 'slug';
    }
}
