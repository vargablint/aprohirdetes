<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

public $table = "users";
public $primaryKey = "user_id";
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    protected $hidden = [
        'jelszo',
        'jelszo_emlekezteto',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }

    public function purchases(): HasMany
    {
        return $this->hasMany(Purchase::class, 'vevo_id');
    }
}