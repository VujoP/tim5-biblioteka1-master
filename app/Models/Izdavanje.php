<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izdavanje extends Model
{
    use HasFactory;
    public function statusknjiges(){
        return $this->belongsToMany(Statusknjige::class);
    }
}
