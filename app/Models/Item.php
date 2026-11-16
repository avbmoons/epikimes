<?php

namespace App\Models;

use App\Enums\Currency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    use HasFactory;

    protected $table = 'items';

    protected $fillable = [
        'id',
        'title',
        'description',
        'palette',
        'size',
        'currency',
        'cost',
        'year',
        'file_path',
        'category_id',
        'is_new',        
        'status',
    ];

    protected $casts = [
        'color_ids' => 'array',
        'cost' => 'decimal:2',
        'currency' => Currency::class,
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'item_has_colors', 'item_id', 'color_id', 'id', 'id');
    }
}
