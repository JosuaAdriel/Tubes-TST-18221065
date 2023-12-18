<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run()
    {
        $data = 
        [
            [
            'title' => 'Hamilton',
            'synopsis'    => 'Film ini mengisahkan perjalanan hidup dari Alexander Hamilton (Lin-Manuel Miranda), mulai dari hanya seorang anak yatim hingga menjadi tokoh di pecahan lembaran uang 10 dolar Amerika Serikat. Selain itu, kita juga akan disaksikan dengan hubungan rivalitas antara Hamilton dengan Leslie Odom Jr. (Leslie Odom Jr.) dan juga kisah romansanya bersama Elizabeth Schuyler (Phillipa Soo).',
            'genre' => 'Musikal',
            'durationInMins' => 120,
            'director' => 'Alexander Hamilton',
            'cast' => 'Lin-Manuel Miranda, Leslie Odom Jr., Phillipa Soo',
            'posterImg' => 'Hamilton.jpg'
            ],
            [
                'title' => 'IT',
                'synopsis'    => 'Film IT menceritakan sosok badut bernama Pennywise yang menganggap dirinya sebagai "Pennywise The Dancing Clown". Pennywise selalu menyeret para korbannya yaitu anak-anak ke dalam selokan. Pada bulan Oktober 1988, seorang remaja bernama Bill Denbrough memberikan sebuah perahu layar terbuat dari kertas kepada adiknya yang berusia tujuh tahun bernama Georgie. Georgie bermain perahu ketika hujan deras di luar rumahnya dan menyusuri Kota Derry.',
                'genre' => 'Horor',
                'durationInMins' => 120,
                'director' => 'Andy Muschietti',
                'cast' => 'Bill Skarsgård, Jaeden Martell, Finn Wolfhard',
                'posterImg' => 'IT.jpeg'
            ],
            [
                'title' => 'Willy Wonka & The Chocolate Factory',
                'synopsis'    => 'Film ini menceritakan tentang seorang anak laki-laki yang bernama Charlie Bucket (Peter Ostrum) yang tinggal bersama kedua orang tuanya dan empat orang kakek-neneknya. Mereka tinggal di sebuah rumah kecil yang berada di dekat pabrik cokelat milik Willy Wonka (Gene Wilder). Charlie sangat menyukai cokelat, namun ia tidak pernah bisa membeli cokelat karena keluarganya hidup dalam kemiskinan.',
                'genre' => 'Fantasi',
                'durationInMins' => 120,
                'director' => 'Mel Stuart',
                'cast' => 'Gene Wilder, Jack Albertson, Peter Ostrum',
                'posterImg' => 'Willy Wonka.jpeg'
            ],
        ];

        // Simple Queries
        //$this->db->query('INSERT INTO movie (title, synopsis, genre, durationInMins, director, cast, posterImg) VALUES(:title:, :synopsis:, :genre:, :durationInMins:, :director:, :cast:, :posterImg:)', $data);

        // Using Query Builder
        $this->db->table('movie')->insertBatch($data);
    }
}