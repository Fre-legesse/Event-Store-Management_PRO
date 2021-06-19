<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class item_request extends Model
{

    use HasRoles;
 protected $table = 'item_requests';
	//primary Key
	public $primaryKey ='IRID';
	//TimeStamps
	public $timestamps = true;

	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Event_id',
        'Requester',
        'Responsible_person',
        'Return_date',
        'Transaction',
        'Transaction_Type',
        'ApprovalOne',
        'ApprovalTwo',
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
        'CDATE' => 'datetime',
        'UDATE' => 'datetime',
    ];
}
