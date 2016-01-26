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
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        $getMasters = User::orderBy('id', 'ASC')
            ->whereIn('role', [3])->get();

        return view('admin.masters.index', [
            'getMasters'    =>  $getMasters
        ]);

    }

    /**
     * Create page-slides page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.page-slides.create');
    }

    /**
     * Store page-slides page
     *
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $rules = [
            'title'             =>  'max:255',
            'description'       =>  'max:255',
            'ordinal_position'  =>  'numeric',
            'slide_photo'       =>  'required|image'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->messages());
        }

        $photoUrl = $this->dispatch(new UploadPhoto($request->file('slide_photo'), PageItem::PHOTO_SLIDES_FOLDER));

        PageItem::create([
            'category_id'   =>  PageItem::PAGE_SLIDES_CATEGORY,
            'title' =>  $request->get('title'),
            'description' => $request->get('description'),
            'ordinal_position'  =>  $request->get('ordinal_position'),
            'photo_url'   =>  $photoUrl
        ]);

        return redirect(route('admin.pageSlides.index'))
            ->with('message', 'Slide photo was successfully created.');
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
