<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','alamat','tgl_lhr','tmp_lahir','j_kelamin','status','no_tlp', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}

/**
* 
*/
class Member extends Model
{
    
    protected $table = 'users';
    protected $primarykey = 'id';
    protected $fillable = ['name','email','password','alamat','tgl_lhr','tmp_lahir','j_kelamin','status','no_tlp','role'];

    public function simpanan(){
        return $this->hasMany('App\Simpanan', 'id');
    }


    public function pinjaman(){
        return $this->hasMany('App\Pinjaman', 'id');
    }
}
