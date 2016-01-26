<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Admin's login page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        return view('admin.auth.getLogin');
    }

    /**
     * Store login
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function postLogin(Request $request)
    {
        $rules = [
            'email' =>  'required',
            'password'  =>  'required'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->messages());
        }

        $credentials = [
            'email' =>  $request->get('email'),
            'password'  =>  $request->get('password'),
            'role'  =>  User::ROLE_ADMIN
        ];

        if (Auth::attempt($credentials)) {
            
            return redirect(route('admin.index.index'));
        }
        
        return redirect(route('admin.auth.getLogin'))
                ->withInput()
                ->withErrors('Credentials does not exist.');
    }

    /**
     * Logout
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getLogout()
    {
        Auth::logout();

        return redirect(route('admin.auth.getLogin'));
    }
}