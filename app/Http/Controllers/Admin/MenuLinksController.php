<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageItem;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MenuLinksController extends Controller
{
    public function __construct()
    {
        return view()->share([
            'activePage'  =>  'menuLinks'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $menuLinks = PageItem::where([
            'category_id'  =>  PageItem::MENU_LINKS_CATEGORY
        ])
            ->orderBy('ordinal_position')
            ->paginate();

        $socialLinksCategory = PageItem::where('category_id', PageItem::SOCIAL_LINKS_CATEGORY)->get();
        $socialLinks = [];

        foreach ($socialLinksCategory as $socialLinkCategory) {
            $socialLinks[$socialLinkCategory->getAttribute('title')] = $socialLinkCategory->getAttribute('value');
        }

        return view('admin.menu-links.index', [
            'menuLinks'  =>  $menuLinks,
            'socialLinks'   =>  $socialLinks
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.menu-links.create');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'title'  =>  'required|max:255',
            'url_to' =>  'required|max:255',
            'ordinal_position'  =>  'numeric'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect(route('admin.menuLinks.create'))
                    ->withErrors($validator->messages());
        }

        PageItem::create([
            'category_id'   =>  PageItem::MENU_LINKS_CATEGORY,
            'title' =>  $request->get('title'),
            'value' =>  $request->get('url_to'),
            'ordinal_position'  =>  $request->get('ordinal_position')
        ]);

        return redirect(route('admin.menuLinks.index'))
                ->with('message', 'Link was successfully created.');
    }

    /**
     * @param PageItem $pageItem
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(PageItem $pageItem)
    {
        return view('admin.menu-links.edit', [
            'menuLink'  =>  $pageItem
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
            'title'  =>  'required|max:255',
            'url_to' =>  'required|max:255',
            'ordinal_position'  =>  'numeric'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect(route('admin.menuLinks.edit', [
                'pageItem'  =>  $pageItem
            ]))
                ->withErrors($validator->messages());
        }

        $pageItem->update([
            'title' =>  $request->get('title'),
            'value' =>  $request->get('url_to'),
            'ordinal_position'  =>  $request->get('ordinal_position')
        ]);

        return redirect(route('admin.menuLinks.index'))
            ->with('message', 'Link was successfully created.');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSocialLinks(Request $request)
    {
        PageItem::firstOrCreate([
            'category_id'   =>  PageItem::SOCIAL_LINKS_CATEGORY,
            'title' =>  'facebook'
        ])->update([
            'value' =>  $request->get('facebook')
        ]);

        PageItem::firstOrCreate([
            'category_id'   =>  PageItem::SOCIAL_LINKS_CATEGORY,
            'title' =>  'twitter'
        ])->update([
            'value' =>  $request->get('twitter')
        ]);

        PageItem::firstOrCreate([
            'category_id'   =>  PageItem::SOCIAL_LINKS_CATEGORY,
            'title' =>  'pinterest'
        ])->update([
            'value' =>  $request->get('pinterest')
        ]);

        PageItem::firstOrCreate([
            'category_id'   =>  PageItem::SOCIAL_LINKS_CATEGORY,
            'title' =>  'instagram'
        ])->update([
            'value' =>  $request->get('instagram')
        ]);

        return redirect(route('admin.menuLinks.index'))
            ->with('message', 'Social links was successfully updated.');
    }

    /**
     * @param PageItem $pageItem
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(PageItem $pageItem)
    {
        $pageItem->delete();

        return redirect(route('admin.menuLinks.index'))
                ->with('message', 'Link was successfully updated.');
    }
}
