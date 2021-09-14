<?php namespace App\Controllers;

use App\Models\ProfileModel;
use App\Models\UserModel;
use CodeIgniter\I18n\Time;
use Config\Services;
use Hybridauth\Provider\Facebook;

class Home extends BaseController
{
    public function __construct()
    {
        helper(['mytext','text']);
    }
    public function index()
    {
        
        // $query = $this->db->query("SELECT * FROM users WHERE id = 1");
        // $results = $query->getRowArray();
        // $query = $this->db->table('users')->where(['username'=>'imranq'])->get();
        // $results = $query->getRow();
        // echo $this->db->getLastQuery()."<br/>";
        // $table = $this->db->table('migrations');
        // $query = $table->get();
        // $results = $query->getResult();
        // var_dump($results);
        // echo view('welcome_message');
        // $userModel = new \App\Models\UserModel();
        // $userModel = model('App\Models\UserModel', false, $this->db);
        // $userModel = model('App\Models\UserModel');
        // $userModel = new UserModel();
        // $user = $userModel->find(1);
        // $user['email'] = 'admin@admin.com';
        // $user['username'] = 'admin';
        // $user = $userModel->delete(1);
        // $data = [
        //     'username' => 'admin',
        //     'password' => password_hash('secret', PASSWORD_DEFAULT),
        //     'email' => 'admin@admin.com',
        // ];
        // $user = $userModel->insert($data);
        // var_dump($user);
        // var_dump(MONTH);
        // exit;
        // $words = word_censor('welcome to codeigniter 4 tutorial seris in urdu and hindi by perfect web solutions', ['urdu','hindi']);
        // echo $words;
       
        // $userProfile = new \App\Models\ProfileModel();
        // $data = ['username' => 'imranq', 'email' => 'admin@admin.com', 'password' => password_hash('secret', PASSWORD_BCRYPT)];
        // $userModel->transBegin();

        // $userModel->insert($data);

        // $data = ['user_id' => $userModel->getInsertID()];
        // if (!$userProfile->insert($data)) {
        //     $userModel->db->transRollback();
        // } else {
        //     $userModel->db->transCommit();
        // }
        // $config = [
        // 'callback' => base_url('/home'),
        // 'keys' => [ 'id' => '208490212917484', 'secret' => '07d54833eda23d7c3ac0105bbdc0fee8' ]
        // ];

        // try {
        //     $facebook = new  Facebook($config);
        //     $facebook->authenticate();
        //     $userProfile = $facebook->getUserProfile();
        //     var_dump($userProfile);
        //     exit;
        // } catch (\Exception $e) {
        //     echo 'Oops, we ran into an issue! ' . $e->getMessage();
        // }
        // // $data = [
        // //     'users' => $userModel->paginate(),
        // //     'pager' => $userModel->pager,
        // // ];
        $userModel = new UserModel();
        // $profileModel = new ProfileModel();
        // $user = $userModel->find(5);
        // $user->options = ['city' => 'Jhelum', 'country' => 'Pakistan'];
        // $userModel->save($user);
        // dd($user->options);
        $data = [
            'users' => $userModel->select('*')->paginate(),
            'pager' => $userModel->pager,
        ];

        return view('welcome_message', $data);
        // username=admin, id=4email=xreichel@example.net,
         // $userModel = new UserModel();
         // $users = $userModel->select("id,username,email,created_at")->like('email', 'net')->findAll(2, 1);
         //SELECT `id`, `username`, `email`, `created_at` FROM `users`
         //select * from users;
         // $user = $userModel->find(5);//SELECT * FROM `users` WHERE `users`.`id` = 1
        // echo $user['email'];
         // var_dump($users);
    }
}
