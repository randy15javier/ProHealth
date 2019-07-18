<?php

namespace App;

use App\Doctor;
use App\Receptionist;
use App\User;
// use App\Scopes\AppointmentScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medical_Date extends Model
{
    use SoftDeletes;

    const CITA_ATENDIDA = 'Atendida';
    const CITA_NO_ATENDIDA = 'No atendida';

    protected $dates = ['deleted_at'];

    protected $table = 'medical_dates';

    protected $fillable = [
    
        'date',
        'time',
        'status',
        'observation',
        'price',
        'patient',
        
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::addGlobalScope(new DatesScope);
    // }
    
    public function estaAtendida()
    {
        return $this->status == Appointment :: CITA_ATENDIDA; 
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }

    public function receptionist()
    {
        return $this->belongsTo(Receptionist::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}


