<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maker extends Model
{
    protected $fillable = ['name', 'phone'];

    protected $hidden = ['updated_at', 'created_at'];

    public static function truncate()
    {
    }

    public function vehicles()
    {
        return $this->hasMany(Vehicle::class);
    }

}
