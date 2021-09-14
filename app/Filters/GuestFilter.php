<?php namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class GuestFilter implements FilterInterface
{

    public function before(RequestInterface $request, $arguments = null)
    {
        $user = session()->get('user');
        if ($user and $user['isLoggedIn']) {
            session()->setFlashData('message', 'You Are Already LoggedIn');
            return redirect()->to('/home');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }

    //--------------------------------------------------------------------
}
