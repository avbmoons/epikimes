<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'id',
        'title',
        'description',
        'status',
    ];

    public function itemsFromCategory()
    {
        return $this->hasMany(Item::class);
    }
}
