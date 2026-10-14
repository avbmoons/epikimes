<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colors';

    protected $fillable = [
        'id',
        'title',
        'description',
    ];

    public function items(): BelongsToMany
    {
        return $this->belongsToMany(Item::class, 'item_has_colors', 'color_id', 'item_id', 'id', 'id');
    }
}
