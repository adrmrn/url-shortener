<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;
use App\Libraries\Shortener; // use Shortener class

class Link extends Model
{
    use FormAccessible; // Laravel Collective

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

    /**
     * Get decoded URL
     *
     * @param  string  $value
     * @return string
     */
    public function formUrlAttribute($value)
    {
        return Shortener::decodeUrl($value);
    }

    /**
     * Get link's name
     *
     * @param  string  $value
     * @return string
     */
    public function formNameAttribute()
    {
        return $this->short_url;
    }
}
