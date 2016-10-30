<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
	/**
     * Get the user that owns the link.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the link's clicks.
     */
    public function clicks()
    {
        return $this->hasMany('App\Click');
    }
}
