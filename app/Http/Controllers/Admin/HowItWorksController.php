<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageItem;
use App\Jobs\UploadPhoto;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HowItWorksController extends Controller
{
    public function __construct()
    {
        return view()->share([
            'activePage'    =>  'howItWorks'
        ]);
    }
    /**
     * How it works index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $howItWorkItems = PageItem::where('category_id', PageItem::HOW_IT_WORKS_CATEGORY)
                            ->orderBy('ordinal_position')
                            ->paginate();

        return view('admin.how-it-works.index', [
            'howItWorkItems'    =>  $howItWorkItems,
            'howItWorkHeader'   =>  PageItem::where('category_id', PageItem::HOW_IT_WORKS_HEADER_CATEGORY)->first()
        ]);
    }

    /**
     * Create how it works item
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.how-it-works.create');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'title' =>  'required|max:255',
            'ordinal_position'  =>  'numeric',
            'photo' =>  'required|image'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect(route('admin.howItWorks.create'))
                    ->withInput()
                    ->withErrors($validator->messages());
        }

        $photoUrl = $this->dispatch(new UploadPhoto($request->file('photo'), PageItem::HOW_IT_WORKS_PHOTOS_FOLDER));

        PageItem::create([
            'category_id'   =>  PageItem::HOW_IT_WORKS_CATEGORY,
            'title'         =>  $request->get('title'),
            'ordinal_position'  =>  $request->get('ordinal_position'),
            'photo_url'     =>  $photoUrl
        ]);

        return redirect(route('admin.howItWorks.index'))
                ->with('message', 'Item was successfully added.');
    }

    /**
     * @param PageItem $pageItem
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(PageItem $pageItem)
    {
        return view('admin.how-it-works.edit', [
            'pageItem'  =>  $pageItem
        ]);
    }

    /**
     * @param PageItem $pageItem
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(PageItem $pageItem, Request $request)
    {
        $rules = [
            'title' =>  'required|max:255',
            'ordinal_position'  =>  'numeric',
            'photo' =>  'image'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->messages());
        }

        if ($request->hasFile('photo')) {

            $photoUrl = $this->dispatch(new UploadPhoto($request->file('photo'), PageItem::HOW_IT_WORKS_PHOTOS_FOLDER));
        }

        $pageItem->update([
            'title'         =>  $request->get('title'),
            'ordinal_position'  =>  $request->get('ordinal_position'),
            'photo_url'     =>  isset($photoUrl) ? $photoUrl : $pageItem->getAttribute('photo_url')
        ]);

        return redirect(route('admin.howItWorks.index'))
            ->with('message', 'Item was successfully added.');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateHeader(Request $request)
    {
        PageItem::firstOrCreate([
            'category_id'  =>  PageItem::HOW_IT_WORKS_HEADER_CATEGORY
        ])->update([
            'title' =>  $request->get('title'),
            'description'   =>  $request->get('description')
        ]);

        return redirect()
            ->back()
            ->with('message', 'How it works header was successfully updated.');
    }

    /**
     * @param PageItem $pageItem
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(PageItem $pageItem)
    {
        $pageItem->delete();

        return redirect(route('admin.howItWorks.index'))
                ->with('message', 'Item was successfully removed.');
    }
}