<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    public function learner()
    {
        return $this->belongsTo('App\Learner');
    }
}
