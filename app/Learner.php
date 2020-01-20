<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Learner extends Model
{
    protected $guarded = ['updated_at'];

    public function registration()
    {
        return $this->belongsTo('App\Registration');
    }

    public function personal()
    {
        return $this->hasOne('App\Personal');
    }
}
