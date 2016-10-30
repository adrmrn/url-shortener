<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    /**
     * Get the link that owns the clicks.
     */
    public function link()
    {
        return $this->belongsTo('App\Link');
    }
}
