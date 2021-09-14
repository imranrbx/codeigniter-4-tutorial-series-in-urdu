<?php namespace App\Database\Seeds;

use App\Models\PostsModel;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use Faker\Factory;

class PostSeed extends Seeder
{
    public function run()
    {
        $faker = Factory::create();
     
        for ($i=0; $i<10; $i++) {
             $this->db->table('posts')->insert([
                'title' => $faker->sentence(3),
                'content' =>$faker->sentence(20),
                'category_id' => random_int(1, 100),
                'thumbnail' => $faker->imageUrl(150, 150, 'sports'),
                'created_at' => Time::parse('now', 'Asia/Karachi'),
                'updated_at' => Time::parse('now', 'Asia/Karachi'),
             ]);
        }
    }
}
