<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Book extends Model
{
    //
    protected $fillable = [
        'title' , 'author' , 'published_year' , 'description' , 'status' , 'deleted'
    ];

    protected $appends  = ['year'];

    protected function year(): Attribute
    {
        return Attribute::make(
            get: fn() => isset($this->attributes['published_year']) ? date('Y', strtotime($this->attributes['published_year'])) : null
        );
    }
    
    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: fn($val) => isset($val) ? date('d M, Y', strtotime($val)) : null
        );
    }
    
}
