<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ClientsController extends Controller
{
    public function __construct()
    {
        return view()->share([
            'activePage'    =>  'clients'
        ]);
    }

    /**
     * CLIENTS INDEX PAGE
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(User $clients)
    {

        $getClients = $clients->getClientsAll();

        return view('admin.clients.index', [
            'getClients'    =>  $getClients

        ]);
    }

    /**
     * CREATE CLIENTS PAGE
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.clients.create');
    }

    /**
     * Store client user
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $rules = [
            'username'          =>  'max:255',
            'first_name'        =>  'max:255',
            'second_name'       =>  'max:255',
            'email'             =>  'max:255'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->messages());
        }

        User::create([
            'username' => $request->get('username'),
            'first_name' => $request->get('first_name'),
            'second_name' => $request->get('second_name'),
            'role' => User::ROLE_USER,
            'email' => $request->get('email')

        ]);


        return redirect(route('admin.clients.index'))
            ->with('message', 'User was successfully created.');
    }

    /**
     * Edit User
     *
     * @param User $getClients
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $getClients)
    {
        return view('admin.clients.edit', [
            'getClients' =>  $getClients
        ]);
    }

    /**
     * Update user
     *
     * @param User $getClients
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(User $getClients, Request $request)
    {
        $rules = [
            'username'          =>  'max:255',
            'first_name'        =>  'max:255',
            'second_name'       =>  'max:255',
            'email'             =>  'max:255'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect(route('admin.clients.edit', [
                'getClients' =>  $getClients
            ]))
                ->withInput()
                ->withErrors($validator->messages());
        }


        $getClients->update([
            'username' => $request->get('username'),
            'first_name' => $request->get('first_name'),
            'second_name' => $request->get('second_name'),
            'email' => $request->get('email')
        ]);

        return redirect(route('admin.clients.index'))
            ->with('message', 'User was successfully updated.');
    }

    /**
     * Destroy user
     *
     * @param User $getClients
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $getClients)
    {

        $getClients->delete();

        return redirect(route('admin.clients.index'))
            ->with('message', 'User was successfully removed.');
    }
}
