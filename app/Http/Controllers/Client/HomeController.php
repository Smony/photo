<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\User;

class HomeController extends Controller
{
    /**
     * Client's home page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (User::ROLE_USER == 1) {
            return view('client.home.index');
        }
        else {

            return view('master.home.index');
        }
    }
}