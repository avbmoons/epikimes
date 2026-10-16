<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageElement extends Model
{
    use HasFactory;

    protected $table = 'page_elements';

    protected $fillable = [
        'id',
        'page',
        'element_key',
        'title',
        'image_path',
        'color',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];
}
