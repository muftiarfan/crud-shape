<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddPatients extends Migration
{

        public function up()
        {
                $this->forge->addField([
                        'ID'          => [
                                'type'           => 'INT',
                                'constraint'     => 5,
                                'unsigned'       => true,
                                'auto_increment' => true,
                        ],
                        'medical_id'       => [
                                'type'           => 'INT',
                                'constraint'     => '60',
                        ],
                        'name' => [
                                'type'           => 'TEXT',
                                'null'           => true,
                        ],
                ]);
                $this->forge->addKey('ID', true);
                $this->forge->createTable('patients_basics');
        }

        public function down()
        {
                $this->forge->dropTable('patients_basics');
        }

}