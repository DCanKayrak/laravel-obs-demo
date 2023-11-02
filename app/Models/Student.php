<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'nationality_id',
        'student_number',
        'first_name',
        'last_name',
        'visa_1',
        'visa_2',
        'final'
    ];

    protected $guarded = ['id'];
}
