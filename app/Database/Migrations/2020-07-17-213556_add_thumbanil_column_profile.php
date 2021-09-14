<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddThumbanilColumnProfile extends Migration
{
    public function up()
    {
        $fields = [
        'thumbnail' => [
            'type'       => 'VARCHAR',
            'constraint' => 255,
            'null'       => true,
            'after' => 'name',
            'default' => null,
        ]
        ];
        $this->forge->addColumn('profiles', $fields);
    }

    //--------------------------------------------------------------------

    public function down()
    {
        $this->forge->dropColumn('profiles', 'thumbnail');
    }
}
