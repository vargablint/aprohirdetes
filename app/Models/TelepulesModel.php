<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TelepulesModel extends Model
{
    public $table = "telepulesek";
    public $primaryKey = "telepules_id";
    public $timestamps = false;
    protected $fillable = [
        'nev',
    ];
}
