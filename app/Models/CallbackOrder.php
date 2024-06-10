<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CallbackOrder extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'phone',
        'email',
        'comment',
        'status',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function connection(): HasMany
    {
        return $this->hasMany(Connection::class);
    }
}
