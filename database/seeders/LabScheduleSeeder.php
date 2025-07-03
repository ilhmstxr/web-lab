<?php

namespace Database\Seeders;

use App\Models\LabSchedule;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Definisikan waktu untuk setiap sesi
        $sessionsData = [
            1 => ['start' => '07:00:00', 'end' => '07:50:00'],
            2 => ['start' => '07:51:00', 'end' => '08:40:00'],
            3 => ['start' => '09:41:00', 'end' => '09:30:00'],
            4 => ['start' => '09:31:00', 'end' => '10:20:00'],
            5 => ['start' => '10:21:00', 'end' => '11:10:00'],
            6 => ['start' => '11:11:00', 'end' => '12:00:00'],
            7 => ['start' => '12:01:00', 'end' => '13:50:00'],
            8 => ['start' => '13:51:00', 'end' => '14:40:00'],
            9 => ['start' => '14:41:00', 'end' => '15:30:00'],
        ];


        // Looping untuk setiap hari kerja (Senin - Jumat)
        for ($day = 1; $day <= 5; $day++) {
            // Looping untuk setiap sesi (1 - 9)
            for ($sessionNum = 1; $sessionNum <= 9; $sessionNum++) {

                // Cek apakah sesi pada hari ini sudah dipesan
                $isBooked = isset($bookedSlots[$day]) && in_array($sessionNum, $bookedSlots[$day]);

                // Buat record baru di database
                LabSchedule::create([
                    'day_of_week' => $day,
                    'session' => $sessionNum,
                    'start_time' => $sessionsData[$sessionNum]['start'],
                    'end_time' => $sessionsData[$sessionNum]['end'],
                    'status' => $isBooked ? 'booked' : 'available',
                    'title' => $isBooked ? 'Digunakan' : 'Tersedia',
                    'color' => $isBooked ? '#ef4444' : '#22c55e', // Merah untuk dipesan, Hijau untuk tersedia
                    'remarks' => $isBooked ? 'Slot ini telah dipesan sesuai jadwal.' : null,
                ]);
            }
        }
    }
}
