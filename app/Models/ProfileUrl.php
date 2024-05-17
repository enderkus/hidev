<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileUrl extends Model
{
    use HasFactory;

    protected $fillable = [
        'personal_webpage',
        'linkedin_profile',
        'x_profile'
    ];

}
