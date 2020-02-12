<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    protected $guarded = ['created_at', 'updated_at'];

    public function total()
    {
        return $this->institutional_development_contributions + $this->donation + $this->facilities_and_infrastructure + $this->educational_assistance_donors + $this->uniform + 865000 + 605000 + 100000 + $this->infaq;
    }
}
