<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Certificate extends Model
{
    use HasFactory;

    protected $fillable = [
        'resident_id',
        'purpose',
        'status',
        'request_date',
    ];

    protected $dates = ['request_date'];

    public function resident()
    {
        return $this->belongsTo(Resident::class);
    }
}
