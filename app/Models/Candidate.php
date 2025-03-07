<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $casts = ['expiring_day' =>'date'];

    protected $fillable = [
        'title',
        'salary_id',
        'category_id',
        'company_name',
        'expiring_day',
        'description',
        'image',
        'user_id'
    ];
}
