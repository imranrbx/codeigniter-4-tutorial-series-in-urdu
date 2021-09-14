<?php namespace App\Controllers;

class Page extends BaseController
{
    public function about()
    {
        $data = [
            'name' => 'Imran Qasim',
            'title' => 'About Us',
        ];
 
        echo view('about', $data);
    }
    public function contact()
    {
        $email = \Config\Services::email();
        $data = array(
            'email' => 'admin@admin.com',
            'title' => 'Contact Us',
            'validator' => null,
        );
        if ($this->request->getMethod() == 'post') {
            if (!$this->validate([
                'email' => 'required|valid_email',
                'name' => 'required',
                'message' => 'required|min_length[10]'
            ])) {
                $data['validator'] =  $this->validator;
            } else {
                $email->setFrom($this->request->getPost('email'));
                $email->setTo('admin@admin.com');
                $email->setSubject($this->request->getPost('name'));
                $email->setMessage($this->request->getPost('message'));
                $email->send();
                $this->session->setFlashData('message', "Email Sent Successfully");
                return redirect()->to('/');
            }
        }
            $data['c_f'] = [
                'form_open' =>  form_open('/contact'),
                'email' => form_input(['type'=>'email','class'=>'form-control', 'name'=>'email', 'value' => $this->request->getPost('email')]),
                'name' => form_input(['type'=>'text','class'=>'form-control', 'name'=>'name', 'value' => $this->request->getPost('name')]),
                'message' => form_textarea(['name'=>'message', 'class'=>"form-control", 'value' => $this->request->getPost('message')]),
                'form_close' => form_close(),
                ];
            return view('contact', $data);
    }
    public function register()
    {
        return view('register');
    }
    public function login()
    {
        return view('login');
    }
}
