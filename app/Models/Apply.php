<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apply extends Model
{
    protected $fillable = ['cv', 'candidate_id', 'user_id'];
}
