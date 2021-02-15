<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    //
    public function students()
    {
        return $this->belongsToMany("App\Student");
    }
    public function payments()
    {
        return $this->hasMany("App\Payment");
    }
    public function times()
    {
        return $this->hasMany("App\Time");
    }
}
