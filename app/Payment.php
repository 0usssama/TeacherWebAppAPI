<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    /**
     * @var mixed
     */


    public function seance()
    {
        return $this->belongsTo('App\Seance');
    }
    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
