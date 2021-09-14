<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOptionsColumnInUsers extends Migration
{
    public function up()
    {
         $fields = [
            'options' => [
                'type'   => 'LONGTEXT',
                'after' => 'password',
                'default' => null,
            ]
         ];
         $this->forge->addColumn('users', $fields);
    }

    //--------------------------------------------------------------------

    public function down()
    {
         $this->forge->dropColumn('users', 'options');
    }
}
