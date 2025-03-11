<?php

namespace App\Models;

use App\Models\Salary;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function salary()
    {
        return $this->belongsTo(Salary::class);
    }
}
