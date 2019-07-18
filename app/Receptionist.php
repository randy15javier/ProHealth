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

	public function medical_dates()
	{
		return $this->hasMany(Medical_Date::class);
	}

}
