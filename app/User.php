<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    const ROLE_USER = 1;
    const ROLE_ADMIN = 2;
    const ROLE_MASTER = 3;


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'first_name',
        'second_name',
        'role',
        'email',
        'password'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Check if user is a admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->getAttribute('role') == self::ROLE_ADMIN;
    }

    public function getClientsAll(){
        $getClients =  User::OrderIdDesc()->Clients()->get();

        return $getClients;
    }
    public function getMastersAll(){
        $getMasters =  User::OrderIdDesc()->Masters()->get();

        return $getMasters;
    }

    public function getAdmAll(){
        $getAdministrators =  User::OrderIdDesc()->Administrators()->get();

        return $getAdministrators;
    }

    /*
    public function deleteClient(User $id){
        $delete = User::where('id', '=', $id)->delete();

        return $delete;
    }
    */

    //========================== SCOPES ==========================

    public function scopeOrderIdAsc($query){
        $query->orderBy('id', 'ASC');
    }

    public function scopeOrderIdDesc($query){
        $query->orderBy('id', 'DESC');
    }

    public function scopeClients($query){
        $query->where('role', User::ROLE_USER);
    }

    public function scopeMasters($query){
        $query->where('role', User::ROLE_MASTER);
    }

    public function scopeAdministrators($query){
        $query->where('role', User::ROLE_ADMIN);
    }
}
