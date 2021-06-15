<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceDetail extends Model
{
    use HasFactory;
    protected $table = "experience_detail";
    protected $guarded = [];
    public $timestamps = false;
}
