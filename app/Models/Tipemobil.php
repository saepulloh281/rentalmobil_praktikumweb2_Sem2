<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipemobil extends Model
{
    use HasFactory;

    protected $table = "tipemobils";

    protected $fillable = [
        'tipe'
    ];
}
