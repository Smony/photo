<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageItem;
use App\Jobs\UploadPhoto;
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
    public function index()
    {

        $getClients = User::orderBy('id', 'ASC')
            ->whereIn('role', [1])->get();

        #dd($usersAll);

        return view('admin.clients.index', [
        'getClients'    =>  $getClients

        ]);

        #return view('admin.clients.index', $getClients);

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
            'email' => $request->get('email')

        ]);


        return redirect(route('admin.clients.index'))
            ->with('message', 'User was successfully created.');
    }

    /**
     * Edit page slide
     *
     * @param PageItem $pageSlide
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(PageItem $pageSlide)
    {
        return view('admin.page-slides.edit', [
            'pageSlide' =>  $pageSlide
        ]);
    }

    /**
     * Update photo
     *
     * @param PageItem $pageSlide
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(PageItem $pageSlide, Request $request)
    {
        $rules = [
            'title'             =>  'max:255',
            'description'       =>  'max:255',
            'ordinal_position'  =>  'numeric',
            'slide_photo'       =>  'image'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect(route('admin.pageSlides.edit', [
                'pageSlide' =>  $pageSlide
            ]))
                ->withInput()
                ->withErrors($validator->messages());
        }

        if ($request->hasFile('slide_photo')) {
            $photoUrl = $this->dispatch(new UploadPhoto($request->file('slide_photo'), PageItem::PHOTO_SLIDES_FOLDER));
        }

        $pageSlide->update([
            'title'         =>  $request->get('title'),
            'description'   =>   $request->get('description'),
            'ordinal_position'  =>  $request->get('ordinal_position'),
            'photo_url'     =>  isset($photoUrl) ? $photoUrl : $pageSlide->getAttribute('photo_url')
        ]);

        return redirect(route('admin.pageSlides.index'))
            ->with('message', 'Item was successfully updated.');
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
