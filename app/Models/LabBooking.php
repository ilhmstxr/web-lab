<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabBooking extends Model
{
    use HasFactory;
    protected $fillable = [
        'schedule_id',
        'bookingDate',
        'sessionTime',
        'name',
        'phoneNumber',
        'status',
    ];
    protected $casts = [
        'bookingDate' => 'date',
    ];
    protected $table = 'lab_bookings';
    protected $primaryKey = 'id';

    public function schedule()
    {
        return $this->belongsTo(LabSchedule::class, 'schedule_id');
    }
}
