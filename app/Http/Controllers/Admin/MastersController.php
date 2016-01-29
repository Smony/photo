<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MastersController extends Controller
{
    public function __construct()
    {
        return view()->share([
            'activePage'    =>  'masters'
        ]);
    }

    /**
     * Masters index page
     * @param User $masters
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(User $masters)
    {

        $getMasters = $masters->getMastersAll();

        return view('admin.masters.index', [
            'getMasters'    =>  $getMasters
        ]);

    }

    /**
     * Create user masters
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.masters.create');
    }

    /**
     * Store user masters
     *
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
            'role' => User::ROLE_MASTER,
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);


        return redirect(route('admin.masters.index'))
            ->with('message', 'Master was successfully created.');
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
     * Destroy page slide
     *
     * @param PageItem $pageSlide
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(PageItem $pageSlide)
    {
        $pageSlide->delete();

        return redirect(route('admin.pageSlides.index'))
            ->with('message', 'Page slide was successfully removed.');
    }
}
