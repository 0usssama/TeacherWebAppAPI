<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //
    public function seance()
    {
        return $this->belongsTo("App\Seance");
    
    }
    public function student()
    {
        return $this->belongsTo("App\Student");
    }

}
