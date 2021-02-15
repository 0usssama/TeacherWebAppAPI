<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //

    protected $guarded = [];

    public function seances()
    {
        return $this->belongsToMany("App\Seance");
    }
    public function payments()
    {
        return $this->hasMany("App\Payment");
    }
}
