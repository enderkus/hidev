<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'content',
        'user_id'
    ];

    public function profileUrls() {
        return $this->hasOne(ProfileUrl::class, 'profile_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }


}
