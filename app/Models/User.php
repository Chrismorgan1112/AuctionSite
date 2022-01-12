<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, HasApiTokens, Notifiable;

    // Fillable can't fill user_id
    protected $guarded = [ 'id' ];

    public function transaction(){
        return $this->hasMany(Transaction::class, 'user_id', 'user_id');
    }
}
