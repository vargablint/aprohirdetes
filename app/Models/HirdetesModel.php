<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HirdetesModel extends Model
{
    use HasFactory;

public $table = "hirdetesek";
public $primaryKey = "hirdetesek_id";
    protected $fillable = [
        'felhasznalo_id',
        'kategoria_id',
        'title',
        'leiras',
        'ar',
        'status',
        'telepules',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(Image::class);
    }

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class, 'hirdetes_id');
    }
}

