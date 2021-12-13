<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    use HasFactory;

    protected $fillable = [
       'username',
       'email',
       'fee_type',
       'amount',
       'total',
       'note',
       'counsellor',
    ];

    public function user()
    {
        return $this->belongsTo(Student::class);
    }
}
