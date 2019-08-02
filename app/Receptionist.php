<?php

namespace App;
use App\Medical_Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Receptionist extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'name',
    	'lastname',
    	'telephone',
        'email',
        'address'
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
