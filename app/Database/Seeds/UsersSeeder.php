<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $data = 
            [
                'email' => 'josua.sinabutar@gmail.com',
                'name'    => 'Josua Adriel Sinabutar',
                'password' => '5f4dcc3b5aa765d61d8327deb882cf99'
            ];

        // Simple Queries
        //$this->db->query('INSERT INTO movie (title, synopsis, genre, durationInMins, director, cast, posterImg) VALUES(:title:, :synopsis:, :genre:, :durationInMins:, :director:, :cast:, :posterImg:)', $data);

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}