<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Stock_category extends Model
{
    //use HasFactory;
    use HasRoles;
    
    protected $table = 'stock_categorys';
	//primary Key
	public $primaryKey ='STID';
	//TimeStamps
	public $timestamps = true;
	use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Company',
        'Department',
        'Type',
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

