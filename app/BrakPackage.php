<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrakPackage extends Model
{

    public function normal_package()
    {
        return $this->hasMany('App\NormalPackage');
    }
}
