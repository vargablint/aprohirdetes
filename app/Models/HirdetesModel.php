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
            'user_id',
            'kategoria_id',
            'title',
            'leiras',
            'ar',
            'status',
            'telepules_id',
        ];

    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

        public function kepek(): HasMany
        {
            return $this->hasMany(KepekModel::class,'hirdetesek_id');
        }

        public function telepules()
    {
        return $this->belongsTo(TelepulesModel::class, 'telepules_id');
    }



    
}

