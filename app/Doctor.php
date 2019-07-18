<?php

namespace App;
use App\Medical_Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
    	'doctor_code',
    	'name',
    	'lastname',
    	'telephone',
    	'email'
    ];

	public function medical_dates()
	{
		return $this->hasMany(Medical_Date::class);
	}

}

