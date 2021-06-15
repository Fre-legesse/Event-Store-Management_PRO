<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPostAndPersonalInformation extends Model
{
    use HasFactory;
    protected $table = "job_post_and_personal_information";
    protected $guarded = [];
    public $timestamps = false;
}
