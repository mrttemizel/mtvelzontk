<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getKysCode(){
        return $this->hasOne(KysCode::class,'id','kys_olcutu');
    }
}
