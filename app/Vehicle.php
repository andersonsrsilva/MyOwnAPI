<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $primaryKey = 'serie';

    protected $fillable = ['serie', 'color', 'power', 'capacity', 'speed'];

    protected $hidden = ['serie'];

    public function maker() {
        return $this->belongsTo(Maker::class);
    }
}
