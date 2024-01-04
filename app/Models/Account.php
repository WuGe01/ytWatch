<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class Account extends Authenticatable
{
    use HasFactory;

    // 重設密碼相關
    use Notifiable;

    protected $table = 'accounts';

    protected $fillable = ['username', 'name', 'email', 'password'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
