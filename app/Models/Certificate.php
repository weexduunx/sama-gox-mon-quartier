<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'applicant',
        'address',
        'phone',
        'purpose',
        'status',
        'request_date',
        'resident_id', // Si vous liez les certificats aux résidents
    ];

    protected $casts = [
        'request_date' => 'date',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}