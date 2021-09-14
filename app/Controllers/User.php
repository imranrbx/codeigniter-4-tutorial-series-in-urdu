<?php
namespace App\Controllers;

use App\Entities\User as UserEntity;
use App\Models\ProfileModel;
use App\Models\UserModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class User extends BaseController {
	private $userModel = null;
	private $profileModel = null;
	public function __construct() {
		$this->userModel = new UserModel();
		$this->profileModel = new ProfileModel();
	}
	public function register() {
		$this->userModel->transBegin();
		$user = new UserEntity($this->request->getPost());
		if (!$this->userModel->insert($user)) {
			$this->session->setFlashData('errors', $this->userModel->errors());
			return redirect()->to('register')->withInput();
		}
		$this->userModel->transCommit();
		$this->session->setFlashData('success' => "User Registered Successfully!");

		return redirect()->to('login');
	}
	public function login() {
		$user = $this->userModel->authenticate($this->request->getPost());
		if ($user) {
			$this->session->set('user', $user);
			$this->session->setFlashData('info' , 'LoggedIn Successfully!');
			return redirect()->to('home');
		}
		$this->session->setFlashData('error', 'Unknown Email or Password');
		return redirect()->to('login')->withInput();
	}
	public function logout() {
		$this->session->remove('user');
		$this->session->setFlashData('success', 'LoggedOut Successfully!');
		return redirect()->to('login');
	}
	public function profile($id) {
		$profile = $this->profileModel->where('user_id', $id)->first();
		if (!$profile) {
			throw PageNotFoundException::forPageNotFound('User Not Found');
		}
		return view('profile', $profile);
	}
	public function update($id = null) {
		$profile = $this->profileModel->find($id);
		$user = $this->userModel->find(session()->get('user')['id']);
		$user->email = $this->request->getPost('email');
		if ($user->hasChanged('email')) {
			$this->session->setFlashData('danger' , "You are not allowed to change Email");
			return redirect()->back()->withInput();
		}
		if (!$profile or $profile['user_id'] != session()->get('user')['id']) {
			$this->session->setFlashData("success" , "You can not Update this user");
			return redirect()->back()->withInput();
		}

		if (!$this->profileModel->update($id, $this->request->getPost())) {
			$this->session->setFlashData('errors', $this->profileModel->errors());
			return redirect()->back()->withInput();
		}
		$this->session->setFlashData('success' , 'Profile Updated Successfully!');
		return redirect()->to('/users/' . $id . '/profile');
	}
	public function changePassword() {
		$id = session()->get('user')['id'];
		if (!$this->userModel->update($id, $this->request->getPost())) {
			$this->session->setFlashData('errors', $this->userModel->errors());
			return redirect()->back()->withInput();
		}
		$this->session->setFlashData('message', 'Password Updated Successfully!');
		return redirect()->to('/users/' . $id . '/profile');
	}
	public function upload() {
		$file = $this->request->getFile('thumbnail');

		$user = session()->get('user');
		$profile = $this->profileModel->where(['user_id', $user['id']])->first();
		if ($file->move(WRITEPATH . 'uploads/images') && $this->profileModel->update($profile['id'], ['thumbnail' => $file->getClientName()])) {
			return redirect()->back()->withInput();
		}
		$this->session->setFlashData('success', 'Profile Thumbnail Updated Successfully!');
		return redirect()->to('/user/' . session()->get('id') . '/profile');
	}
}
