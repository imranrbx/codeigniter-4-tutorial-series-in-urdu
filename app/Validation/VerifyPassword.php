<?php namespace App\Validation;

use CodeIgniter\HTTP\RequestInterface;
use Config\Services;
use App\Models\UserModel;

class VerifyPassword
{
    private $reqeust;

    public function __construct(RequestInterface $request = null)
    {
        if (is_null($request)) {
            $request = Services::request();
        }

        $this->request = $request;
    }
    public function verify($password = null, string $fields, array $data)
    {
        $fields = explode(',', $fields);

        foreach ($fields as $field) {
            if (array_key_exists($field, $data)) {
                return true;
            }
        }
        $userModel = new UserModel();
        $user = $userModel->find(session()->get('user')['id']);
        $verify = password_verify($password, $user['password']);
        if (!$verify) {
            return false;
        }
    }
}
