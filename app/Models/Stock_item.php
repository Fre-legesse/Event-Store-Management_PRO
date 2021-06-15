<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Stock_item extends Model
{
   use HasFactory;
   use HasRoles;
    
	//Table Name
protected $table = 'stock_items';
	//primary Key
	public $primaryKey ='SIID';
	//TimeStamps
	public $timestamps = true;

	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Item',
        'Item_Code',
        'Asset_Noo',
        'Size',
        'Fabric',
        'Color',
        'Type',
        'Brand',
        'Manufacturer',
        'Countable',
        'Status',
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
