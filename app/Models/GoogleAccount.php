<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoogleAccount extends Model
{
    protected $fillable = ['google_id', 'name', 'token'];
    protected $casts = ['token' => 'json'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function calendars()
    {
        return $this->hasMany(Calendar::class);
    }
}
