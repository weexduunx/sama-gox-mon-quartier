<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'profession',
        'family',
        'registration_date',
    ];

    protected $dates = ['registration_date'];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function complaints()
    {
        return $this->hasMany(Complaint::class);
    }
}
