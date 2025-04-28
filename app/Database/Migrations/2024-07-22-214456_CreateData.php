<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateData extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'date' => [
                'type' => 'DATE',
            ],
            'periode' => [
                'type' => 'ENUM',
                'constraint' => 'januari','februari','maret','april','mei','juni','juli','agustus','september','oktober','november','desember',
            ],
            'ip' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'average' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'max' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'cpu' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'ram' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'hdd' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'tagihan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'backup' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'file_path' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
            'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('mapp_table');
    }

    public function down()
    {
        $this->forge->dropTable('mapp_table');
        $this->forge->dropColumn('mapp', 'file_path');
    }
}
