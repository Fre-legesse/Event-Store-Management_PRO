<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class stock_user extends Model
{
    use HasFactory;protected $table = 'stock_users';
	//primary Key
	public $primaryKey ='ID';
	//TimeStamps
	public $timestamps = true;

	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'User_ID',
        'Stock_ID',
        'Branch',
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
