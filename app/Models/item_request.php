<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class item_request extends Model
{

    use HasRoles;

    public $primaryKey = 'IRID';
    //primary Key
    public $timestamps = true;
    //TimeStamps
    protected $table = 'item_requests';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Event_id',
        'Requester',
        'Responsible_person_BGI',
        'Responsible_person_Client',
        'Return_date',
        'Transaction',
        'Transaction_Type',
        'Phone_Number_BGI',
        'Phone_Number_Client',
        'ApprovalOne',
        'ApprovalTwo',
        'Posted',
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
        'Return_date' => 'datetime',
        'CDATE' => 'datetime',
        'UDATE' => 'datetime',
    ];
}
