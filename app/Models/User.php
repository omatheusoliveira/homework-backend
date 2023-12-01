<?php

namespace App\Models;
use App\Models\Sale;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
    ];

    public function sales(): HasMany
    {
        return $this->hasMany(Sale::class);
    }

}