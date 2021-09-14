<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Categories extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                    'type'           => 'INT',
                    'constraint'     => 9,
                    'auto_increment' => true,
                    'unsigned' => true,
            ],
            'title' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false
            ],
            
            'description'       => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'created_at'       => [
                'type'       => 'TIMESTAMP',
                null => false,
            ],
             'updated_at'       => [
                'type'       => 'TIMESTAMP',
                null => false,
            ],
             'deleted_at'       => [
                'type'       => 'TIMESTAMP',
                null => true,
                'default' => null
            ],
                ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('categories', true);
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('categories', true);
    }
}
