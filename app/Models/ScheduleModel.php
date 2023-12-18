<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model
{
    protected $table = 'schedule';
    protected $primaryKey = 'scheduleID';
    public function getDataSchedule(){
        return $this->orderBy('scheduleID', 'DESC')->findAll(1000);
    }

    public function insertSchedule($movieID, $studioID, $showtime, $price)
    {
        $data = [
            'movieID' => $movieID,
            'studioID' => $studioID,
            'showtime' => $showtime,
            'price' => $price
        ];

        return $this->db->table('schedule')->insert($data);
    }
    public function getScheduleDetails()
    {
        // Fetch schedule details along with related movie and studio information
        return $this->select('schedule.scheduleID, movie.title, studio.studioName, schedule.showtime, schedule.price, studio.capacity')
                    ->join('movie', 'movie.movieID = schedule.movieID')
                    ->join('studio', 'studio.studioID = schedule.studioID')
                    ->get()
                    ->getResultArray();
    }

    public function deleteSchedule($scheduleID)
    {
        return $this->db->table('schedule')->where('scheduleID', $scheduleID)->delete();
    }
    public function getSchedulesForStudio($studioID)
    {
        return $this->where('studioID', $studioID)->findAll();
    }
    protected $allowedFields = ['movieID', 'studioID', 'showtime', 'price', 'scheduleID'];
    // Add other configurations or methods as needed
}
