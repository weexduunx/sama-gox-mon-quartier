<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'complainant',
        'type',
        'description',
        'address',
        'date',
        'status',
        'priority',
        'resident_id',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}