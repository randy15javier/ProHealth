<?php

namespace App;
use App\Medical_Date;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'email', 
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    public function setNameAttribute($valor)

    {
        $this->attributes['name'] = strtolower($valor);
    }


    public function getNameAttribute($valor)
    
    {
        return ucwords($valor);
    }

    public function setLastnameAttribute($valor)

    {
        $this->attributes['lastname'] = strtolower($valor);
    }


    public function getLastnameAttribute($valor)
    
    {
        return ucwords($valor);
    }

     public function setEmailAttribute($valor)

    {
        $this->attributes['email'] = strtolower($valor);
    }

    public function medical_dates()
	{
		return $this->hasMany(Medical_Date::class);
	}
}
