<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    
    protected $fillable = ['nama' ,'nrp', 'email','jurusan_id','file'];

    public function school()
    {
        return $this->hasMany('App\Major', 'id', 'jurusan_id');
    }
}
