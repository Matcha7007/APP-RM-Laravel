<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class Layout extends Controller
{
    public function index()
    {
        // echo 'test';
        return View('layout.main');
    }

    public function dashboard()
    {
        return View('components.dashboard');
    }
}
