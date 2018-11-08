<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function magasins() {
        return $this->belongsToMany('App\Magasin','users_magasins','user_id','magasin_id');
    }
    public function userMagasins() {
        return $this->hasMany('App\UserMagasin','user_id','id');

    }
   public function rolesByMagasin($magasin_id) {
      return $this->userMagasins->where('magasin_id',$magasin_id)->first()->roles;
   }
}
