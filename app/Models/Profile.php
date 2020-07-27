<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'theme_id',
        'location',
        'medipracticename', 
        'speciality',
        'yearofmediprac',
        'placeofwork',
        'addressofpow',
        'contact',
        'workemail',
        'cv_attachment',
        'attachment1',
        'attachment2',
        'attachment3',
        'attachment4',
        'attachment5',
        'attachment6',
        'attachment7',
        'attachment8',
        'age',
        'dofb',
        'maritalstatus',
        'religion',
        'occuption',
        'nofkin',
        'nofkinrelationship',
        'nofkinrelationshipcontact',
        'chronicillness',
        'allergies',
        'medication_suppliments',
        'weight',
        'height',
        'bio',
        'avatar',
    ];

            

    protected $casts = [
        'theme_id' => 'integer',
    ];

    /**
     * A profile belongs to a user.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Profile Theme Relationships.
     *
     * @var array
     */
    public function theme()
    {
        return $this->hasOne('App\Models\Theme');
    }
}
