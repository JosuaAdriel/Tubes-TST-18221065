<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run()
    {
        $data = 
        [
            [
            'movieID' => 1,
            'studioID'    => 1,
            'showtime' => '2024-06-01 10:00:00',
            'price' => 100
            ],
            [
                'movieID' => 2,
                'studioID'    => 2,
                'showtime' => '2023-12-01 10:00:00',
                'price' => 120
            ],
            [
                'movieID' => 2,
                'studioID'    => 2,
                'showtime' => '2024-01-01 10:00:00',
                'price' => 120
            ],
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO movie (title, synopsis, genre, durationInMins, director, cast, posterImg) VALUES(:title:, :synopsis:, :genre:, :durationInMins:, :director:, :cast:, :posterImg:)', $data);

        // Using Query Builder
        $this->db->table('schedule')->insertBatch($data);
    }
}