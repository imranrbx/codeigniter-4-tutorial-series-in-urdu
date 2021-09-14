<?php namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class ProfileSeed extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $userModel = new UserModel();
        $users = $userModel->findAll();

        foreach ($users as $user) {
             $this->db->table('profiles')->insert([
                'user_id' => $user['id'],
                'name' => $faker->name,
                'thumbnail' => base_url('writable/uploads/images/10.jpg'),
                'created_at' => new Time('now'),
                'updated_at' => new Time('now'),
             ]);
        }
    }
}
