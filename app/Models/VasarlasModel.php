<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VasarlasModel extends Model
{
    public $table = "vasarlasok";
    public $primaryKey = "vasarlasok_id";
    public $timestamps = false;
        protected $fillable = [
            'vevo_id',
            'hirdetesek_id',
            'amount',
            'status',
        ];

    public function buyer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'vevo_id');
    }

    public function listing(): BelongsTo
    {
        return $this->belongsTo(Listing::class);
    }
}
