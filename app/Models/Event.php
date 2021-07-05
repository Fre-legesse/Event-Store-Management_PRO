<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;


class Event extends Model
{
    use HasFactory;
    use HasRoles;

    public $primaryKey = 'EVID';
    //primary Key
    public $timestamps = true;
    //TimeStamps
    protected $table = 'events';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Event_Name',
        'Date_From',
        'Date_To',
        'Location',
        'Description',
        'Event_Type',
        'Company',
        'Department',
        'CUID',
        'UUID',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'Date_From' => 'datetime',
        'Date_To' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

}
