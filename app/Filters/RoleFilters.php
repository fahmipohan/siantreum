<?php

namespace App\Filters;

use CodeIgniter\Config\Services;
use CodeIgniter\Exceptions\PageNotFoundException;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RoleFilters implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->has('roles')) {
            return redirect()->to('/login');
        }

        // Check if user is not admin
        if($arguments[0] == 'admin'){
            if (session()->get('roles') != 'admin') {
                throw new PageNotFoundException();
            }
        }

        if($arguments[0] == 'dosen'){
            if (session()->get('roles') != 'dosen') {
                throw new PageNotFoundException();
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
