<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory;
    use Notifiable;
   // protected $guarded=['tipkorisnika_id'];
    public function tipkorisnika(){
        return $this->belongsTo(Tipkorisnika::class);
    }
    public function korisniklogin(){
        return $this->hasMany(Korisniklogin::class);
    }
    public function knjigas(){
        return $this->belongsToMany(Knjiga::class);
    }
protected $fillable=['tipkorisnika_id','password','ImePrezime','KorisnickoIme','Email'];
protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
?>
