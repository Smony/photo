<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageItem;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IfYouItemsController extends Controller
{
    public function __construct()
    {
        return view()->share([
            'activePage'  =>  'ifYouItems'
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $ifYouItems = PageItem::where('category_id', PageItem::IF_YOU_ITEMS_CATEGORY)
                    ->orderBy('ordinal_position')
                    ->paginate();

        return view('admin.if-you-items.index', [
            'ifYouItems'  =>  $ifYouItems
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.if-you-items.create');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $rules = [
            'title' =>  'required|max:255',
            'meta'  =>  'max:255',
            'description'   =>  '',
            'ordinal_position'  =>  'numeric'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validator->messages());
        }

        PageItem::create([
            'category_id'   =>  PageItem::IF_YOU_ITEMS_CATEGORY,
            'title' =>  $request->get('title'),
            'ordinal_position'  =>  $request->get('ordinal_position'),
            'value' =>  $request->get('meta'),
            'description'   =>  $request->get('description'),
        ]);

        return redirect(route('admin.ifYouItems.index'))
                ->with('message', 'Item was successfully created.');
    }

    /**
     * @param PageItem $pageItem
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(PageItem $pageItem)
    {
        return view('admin.if-you-items.edit', [
            'ifYouItem'  =>  $pageItem
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
            'meta'  =>  'max:255',
            'description'   =>  '',
            'ordinal_position'  =>  'numeric'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator->messages());
        }

        $pageItem->update([
            'title' =>  $request->get('title'),
            'ordinal_position'  =>  $request->get('ordinal_position'),
            'value' =>  $request->get('meta'),
            'description'   =>  $request->get('description'),
        ]);

        return redirect(route('admin.ifYouItems.index'))
            ->with('message', 'Item was successfully updated.');
    }

    /**
     * @param PageItem $pageItem
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(PageItem $pageItem)
    {
        $pageItem->delete();

        return redirect(route('admin.ifYouItems.index'))
                ->with('message', 'Item was successfully removed.');
    }
}