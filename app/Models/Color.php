<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    protected function extractedHex(): Attribute
    {
        return Attribute::make(
            get: function() {
                if (preg_match('/(#[a-fA-F0-9]{6}|#[a-fA-F0-9]{3})/', $this->description, $matches)) {
                    return $matches[1];
                }
                return '#ffffff';
            }
        );
    }
}
