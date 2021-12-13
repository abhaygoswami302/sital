<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [            
        'name',
        'username',
        'email',
        'phone_no',
        'visa_category',
        'status',
        'document',
        'admin_note',
        'email_verified_at',
        'checksum',
        'checksum2',
    ];

    public function fees()
    {
        return $this->hasMany(Fee::class);
    }
}
