<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TelepulesModel extends Model
{
    Use HasFactory;

    public $table = "telepulesek";
    public $primaryKey = "telepules_id";
    public $timestamps = false;
    protected $fillable = [
        'nev',
    ];
}
