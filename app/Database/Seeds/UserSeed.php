<?php namespace App\Database\Seeds;

use App\Models\UserModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class UserSeed extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
        $userModel = new UserModel();
        for ($i=0; $i<5; $i++) {
             $this->db->table('users')->insert([
                'username' => $faker->userName,
                'password' => password_hash('secret', PASSWORD_DEFAULT),
                'email' => $faker->safeEmail,
                'created_at' => Time::parse('now', 'Asia/Karachi'),
                'updated_at' => Time::parse('now', 'Asia/Karachi'),
             ]);
        }
    }
}
