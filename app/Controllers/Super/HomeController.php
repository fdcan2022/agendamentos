<?php

namespace App\Controllers\Super;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class HomeController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'description' => 'Descrição da página inicial',
            'author' => 'Seu nome'
        ];


        echo view('Back/Home/index',$data);

    }
}
