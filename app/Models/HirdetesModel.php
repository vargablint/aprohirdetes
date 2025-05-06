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

    public function kategoria(): BelongsTo
    {
        return $this->belongsTo(KategoriaModel::class);
    }

    public function vasarlasok(): BelongsTo
    {
        return $this->belongsTo(VasarlasModel::class, 'hirdetes_id');
    }

    public function telepules()
{
    return $this->belongsTo(TelepulesModel::class, 'telepules_id');
}
}

