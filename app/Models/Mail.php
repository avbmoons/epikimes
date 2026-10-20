<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Mail extends Model
{
    use HasFactory;

    protected $table = 'mails';

    protected $fillable = [
        'user_id',
        'username',
        'email',
        'description',
        'status',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // public function getMails(): Collection
    // {
    //     return DB::table($this->table)->get();
    // }

    // public function getMailById(int $id): mixed
    // {
    //     return DB::table($this->table)->find($id);
    // }
}
