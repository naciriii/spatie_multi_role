<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class UserMagasin extends Model
{
    //
    use HasRoles;
    protected $table ="users_magasins";
    protected $guard_name = 'web'; // or whatever guard you want to use


}
