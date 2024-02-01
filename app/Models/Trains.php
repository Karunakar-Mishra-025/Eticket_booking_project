<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trains extends Model
{
    protected $fillable=[
        'id',
        'trainno',
        'name',
        'av_seats_no',
        'available_seats',
        'from_station',
        'from',
        'to_station',
        'to',
        'date',
        'arrival_date',
        'deparcher',
        'arrival',
        'stops'
    ];
    use HasFactory;
}
