<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KysCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'kys_category_name',
    ];
}
