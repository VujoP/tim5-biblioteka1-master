<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Knjiga extends Model
{
    use HasFactory;
    public $table = 'knjiga';

    public function pismo(){
        return $this->belongsTo(Pismo::class, 'PismoId');
    }


    public function autori(){
        return $this->belongsToMany(Autor::class,
            'knjigaautor', 'AutorId', 'KnjigaId', 'Id', 'Id');
    }
}
