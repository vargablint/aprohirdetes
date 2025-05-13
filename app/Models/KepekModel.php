<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KepekModel extends Model
{
    protected $table = 'kepek';

    protected $fillable = ['hirdetesek_id', 'image_path'];

    public function hirdetes()
    {
        return $this->belongsTo(HirdetesModel::class, 'hirdetesek_id');
    }
}

