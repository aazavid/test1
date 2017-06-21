<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NormalPackage extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'id_client');
    }
    public function brak()
    {
        return $this->belongsTo('App\BrakPackage');
    }
}
