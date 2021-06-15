<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class stock_color extends Model
{
    use HasFactory;
    use HasRoles;
    

     protected $table = 'stock_colors';
	//primary Key
	public $primaryKey ='SCID';
	//TimeStamps
	public $timestamps = true;

	 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Type',
        'Color',
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
