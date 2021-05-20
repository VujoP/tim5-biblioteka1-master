<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pismo extends Model
{
    use HasFactory;

    public $table = 'pismo';

    public function knjige(){
        return $this->hasMany(Knjiga::class, 'PismoId');
    }
}
