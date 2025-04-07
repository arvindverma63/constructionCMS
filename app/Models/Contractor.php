<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contractor extends Model
{
    use HasFactory;
    protected $table = 'contractors';
    protected $fillable = [
        'userId',
        'name',
        'phoneNumber',
        'email',
        'companyName',
        'image',
        'aadhar',
        'experience',
        'field'
    ];
}
