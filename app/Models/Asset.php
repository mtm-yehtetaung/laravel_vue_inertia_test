<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $table = 'assets';

    protected $fillable = [
        'code',
        'assets_class',
        'assets_name',
        'active',
    ];
}
