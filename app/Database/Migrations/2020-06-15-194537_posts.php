<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Posts extends Migration
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
            'content'       => [
                'type'       => 'TEXT',
                'null'       => false,
            ],
            'thumbnail'       => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => false,
            ],
            'category_id'  => [
                'type'       => 'INT',
                'constraint' => 9,
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
                'default' => null,
            ],
                ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('posts', true);
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropTable('posts', true);
    }
}
