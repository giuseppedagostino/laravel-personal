<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    // DB relationships
    public function articles() {
        return $this->belongsToMany('App\Article');
    }
}
