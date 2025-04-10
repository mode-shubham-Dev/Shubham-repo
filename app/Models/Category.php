<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Str;

class Category extends Model
{
    protected $guarded = ['id'];

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
