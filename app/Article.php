<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $fillable = [
        'title',
        'slug',
        'subtitle',
        'image',
        'author',
        'content',
        'publication_date'
    ];
}
