<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class requested_item_list extends Model
{
    use HasFactory;  use HasRoles;
 protected $table = 'reqested_item_lists';
	//primary Key
	public $primaryKey ='RILID';
	//TimeStamps
	public $timestamps = true;

	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Request_ID',
        'Event_ID',
        'ItemCode',
        'Quantity',
        'Approval1Quantity',
        'Approval2Quantity',
        'IssuedQuantity',
        'CUID',
        'UUID',
    ];

   
   
}
