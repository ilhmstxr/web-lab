<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'scheduleName',
        'scheduleDate',
        'startTime',
        'endTime',
        'isActive',
    ];

    protected $casts = [
        'scheduleDate' => 'date',
        'startTime' => 'datetime',
        'endTime' => 'datetime',
        'isActive' => 'boolean',
    ];
    protected $table = 'lab_schedules';
    protected $primaryKey = 'id';

    public function bookings()
    {
        return $this->hasMany(LabBooking::class, 'schedule_id');
    }
    
}
