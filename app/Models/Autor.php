<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    public $table = 'autor';


    public function knjige(){
        return $this->belongsToMany (Knjiga::class,
            'knjigaautor', 'AutorId', 'KnjigaId', 'Id', 'Id');
    }
}
