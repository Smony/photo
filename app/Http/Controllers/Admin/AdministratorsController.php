<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdministratorsController extends Controller
{
    public function __construct()
    {
        return view()->share([
            'activePage'    =>  'administrators'
        ]);
    }

    /**
     * ADMINISTRATORS INDEX PAGE
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(User $adm)
    {

        $getAdministrators = $adm->getAdmAll();

        return view('admin.administrators.index', [
            'getAdministrators'    =>  $getAdministrators
        ]);


    }

    /**
     * CREATE ADMINISTRATOR PAGE
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.administrators.create');
    }

    /**
     * STORE ADMINISTRATOR USER
     * @param User $userModel
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(User $userModel, Request $request)
    {

        //dd($request->all());
        //$userModel->create($request->all());

        $rules = [
            'username' => 'required|max:255|unique:users',
            'first_name' => 'required|max:255',
            'second_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->messages());
        }

        $userModel->create([
            'username' => $request->get('username'),
            'first_name' => $request->get('first_name'),
            'second_name' => $request->get('second_name'),
            'role' => User::ROLE_ADMIN,
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))


        ]);


        return redirect(route('admin.administrators.index'))
            ->with('message', 'Administrator was successfully created.');
    }

    /**
     * Edit User
     *
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        return view('admin.clients.edit', [
            'user' =>  $user
        ]);
    }

    /**
     * Update user
     *
     * @param User $user
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(User $user, Request $request)
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
                'user' =>  $user
            ]))
                ->withInput()
                ->withErrors($validator->messages());
        }


        $user->update([
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
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user)
    {

        $user->delete();

        return redirect(route('admin.clients.index'))
            ->with('message', 'User was successfully removed.');
    }
}
