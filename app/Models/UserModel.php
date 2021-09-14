<?php namespace App\Models;

use App\Models\ProfileModel;
use CodeIgniter\Model;

class UserModel extends Model {
	protected $table = "users";
	protected $DBGroup = "default";
	protected $primaryKey = 'id';
	protected $allowedFields = ['username', 'email', 'password', 'options'];
	protected $useTimestamps = true;
	protected $returnType = 'App\Entities\User';
	protected $validationRules = [
		'username' => 'required|alpha_numeric|min_length[3]',
		'email' => 'required|valid_email|is_unique[users.email]',
		'old_password' => 'required_without[username]|verify[username,]',
		'password' => 'required|min_length[8]',
		'password_confirmation' => 'required|matches[password]'];

	protected $validationMessages = ['password_confirmation' => ['required' => 'Password Confirmation is Required', 'matches' => 'Password Confirmation field does not Match']];
	protected $beforeInsert = ['hashPassword'];
	protected $beforeUpdate = ['hashPassword'];
	protected $afterInsert = ['updateProfile'];
	public function transBegin() {
		return $this->db->transBegin();
	}
	public function transRollback() {
		return $this->db->transRollback();
	}
	public function transCommit() {
		return $this->db->transCommit();
	}
	public function hashPassword($data) {
		$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		return $data;
	}
	public function updateProfile($data) {
		$profileModel = new ProfileModel();
		$profileModel->insert(['user_id' => $data['id']]);
	}
	public function authenticate($user) {
		$password = $user['password'];
		$user = $this->getWhere(['email' => $user['email']]);
		if ($user->resultID->num_rows > 0) {
			$user = $user->getRow();
			$verify = password_verify($password, $user->password);
			if ($verify) {
				return ['id' => $user->id, 'username' => $user->username, 'email' => $user->email, 'isLoggedIn' => true];
			} else {
				return false;
			}
		}
		return false;
	}
}
