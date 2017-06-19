<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NormalPackage extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'id_client');
    }
}
