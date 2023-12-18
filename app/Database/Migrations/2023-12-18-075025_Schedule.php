<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Schedule extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'scheduleID' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'movieID' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'studioID' => [
                'type'           => 'INT',
                'constraint'     => 11,
            ],
            'showtime' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ]
        ]);
        $this->forge->addPrimaryKey('scheduleID', true);
        $this->forge->addForeignKey('movieID', 'movie', 'movieID', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('studioID', 'studio', 'studioID', 'CASCADE', 'CASCADE');
        $this->forge->createTable('schedule');
    }

    public function down()
    {
        $this->forge->dropTable('schedule');
    }
}
