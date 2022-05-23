<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $table = 'customers';

    protected $fillable = [
        'id',
        'name',
        'user_name',
        'zip_code',
        'email',
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        if ('' != $value) {
            $this->attributes['password'] = bcrypt($value);
        }
    }
}
