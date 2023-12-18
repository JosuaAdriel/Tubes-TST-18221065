<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Studio extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'studioID' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'studioName' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'status' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'capacity' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'generated_seats' => [
                'type'       => 'JSON',
            ]
        ]);
        $this->forge->addPrimaryKey('studioID', true);
        $this->forge->createTable('studio');
    }

    public function down()
    {
        $this->forge->dropTable('studio');
    }
}
