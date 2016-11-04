<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = [
        'url', 'short_url', 'description'
    ];

	/**
     * Get the user that owns the link.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the link's clicks.
     */
    public function clicks()
    {
        return $this->hasMany(Click::class);
    }
}
