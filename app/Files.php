<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    protected $fillable = ['title', 'description', 'path'];

    protected $hidden = ['created_at', 'updated_at'];
}
