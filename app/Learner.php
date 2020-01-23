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

    public function address()
    {
        return $this->hasOne('App\Address');
    }

    public function detail()
    {
        return $this->hasOne('App\Detail');
    }

    public function father()
    {
        return $this->hasOne('App\Father');
    }

    public function mother()
    {
        return $this->hasOne('App\Mother');
    }

    public function guardian()
    {
        return $this->hasOne('App\Guardian');
    }

    public function priodic()
    {
        return $this->hasOne('App\Priodic');
    }

    public function cost()
    {
        return $this->hasOne('App\Cost');
    }
}
