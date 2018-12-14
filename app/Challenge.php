<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    public function users()
    {
        # withTimestamps will ensure the pivot table has its created_at/updated_at fields automatically maintained
        return $this->belongsToMany('App\User')->withTimestamps();
    }
}
