<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KategoriaModel extends Model
{
    use HasFactory;

    public $table = "kategoriak";
    public $primaryKey = "kategoria_id";
    public $timestamps = false;
    protected $fillable = [
        'nev',
    ];

    public function listings(): HasMany
    {
        return $this->hasMany(Listing::class);
    }
}