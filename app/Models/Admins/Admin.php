<?php

namespace App\Models\Admins;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Admin extends Authenticatable
{
    use   HasFactory, Notifiable;

    const TABLE = 'admins';
    protected $table = self::TABLE;

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'remember_token	',
        'created_at',
        'updated_at'
    ];
}
