<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    public function Jurusan()
    {
        return $this->belongsTo('App\Student');
    }
}
