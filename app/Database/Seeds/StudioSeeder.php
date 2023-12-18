<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class StudioSeeder extends Seeder
{
    public function run()
    {
        $data = 
        [
            [
                'studioName' => 'Studio 1',
                'status'    => 1,
                'capacity' => 10,
                'generated_seats' => json_encode(['A1', 'B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1', 'I1', 'J1'])
            ],
            [
                'studioName' => 'Studio 2',
                'status'    => 1,
                'capacity' => 3,
                'generated_seats' => json_encode(['A1', 'B1', 'C1'])
            ],
            [
                'studioName' => 'Studio 3',
                'status'    => 1,
                'capacity' => 10,
                'generated_seats' => json_encode(['A1', 'B1', 'C1', 'D1', 'E1', 'F1', 'G1', 'H1', 'I1', 'J1'])
            ]
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO movie (title, synopsis, genre, durationInMins, director, cast, posterImg) VALUES(:title:, :synopsis:, :genre:, :durationInMins:, :director:, :cast:, :posterImg:)', $data);

        // Using Query Builder
        $this->db->table('studio')->insertBatch($data);
    }
}