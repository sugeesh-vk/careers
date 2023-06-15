<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class careers extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email','phone','location','job_title','job_description','job_type'];
}
