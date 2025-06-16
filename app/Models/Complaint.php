<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'type',
        'description',
        'address',
        'priority',
        'status',
        'date',
    ];

    protected $dates = ['date'];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
