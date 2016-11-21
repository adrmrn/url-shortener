<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
	protected $fillable = [
        'ip', 'device'
    ];

    /**
     * Get the link that owns the clicks.
     */
    public function link()
    {
        return $this->belongsTo(Link::class);
    }
}
