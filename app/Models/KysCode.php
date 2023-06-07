<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KysCategory;

class KysCode extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getKysCategory(){
        return $this->hasOne(KysCategory::class,'id','kyscategory_id');
    }


}
