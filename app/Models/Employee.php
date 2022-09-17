<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'emp_name',
        'emp_father_name',
        'emp_cnic',
        'emp_contact',
        'emp_type',
        'emp_designation',
        'emp_sallary',
        'emp_code',
        'emp_photo',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();
        self::creating(function($model){
            $model->user_id = auth()->id();
        });
    }
}
