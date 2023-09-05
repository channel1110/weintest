<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    //use SoftDeletes;
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'userid',
        'birth',
        'email',
        'password',
        'agree1',
        'agree2',
        'deleted_at',
        'register_date',
        'register_status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // 탈퇴한 회원 기간
    public function isWithinGracePeriod()
    {
        if (!$this->deleted_at) {
            return false; 
        }
        $deletedAt = new Carbon($this->deleted_at);

        return $deletedAt->diffInDays(now()) >= 30;
    }
         
}
