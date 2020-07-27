<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctor_id',
        'appointmentdate',
        'patient_id',
        'appointmentstatus',
        'appointmentreason',
        
    ];

    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
   
}
