<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Movie extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'movieID' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'synopsis' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'genre' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'durationInMins' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'director' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'cast' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'posterImg' => [
                'type'       => 'VARCHAR',
                'constraint' => '128',
            ]
        ]);
        $this->forge->addKey('movieID', true);
        $this->forge->createTable('movie');
    }

    public function down()
    {
        $this->forge->dropTable('movie');
    }
}
