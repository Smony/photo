<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\PageItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactItemsController extends Controller
{
    public function __construct()
    {
        return view()->share([
            'activePage'  =>  'contactItems'
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactItemsCategories = PageItem::where('category_id', PageItem::CONTACT_ITEMS_CATEGORY)->get();
        $contactItems = [];

        foreach ($contactItemsCategories as $contactItemsCategory) {
            $contactItems[$contactItemsCategory->getAttribute('title')] = $contactItemsCategory->getAttribute('value');
        }

        return view('admin.contact-items.index', [
            'contactItems'  =>  $contactItems,
            'siteTitle'     =>  PageItem::where('category_id', PageItem::SITE_TITLE_CATEGORY)->first()
        ]);
    }

    /**
     * @param PageItem $pageItem
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        PageItem::firstOrCreate([
            'category_id'   =>  PageItem::CONTACT_ITEMS_CATEGORY,
            'title' =>  'phone_number'
        ])->update([
            'value' =>  $request->get('phone_number')
        ]);

        PageItem::firstOrCreate([
            'category_id'   =>  PageItem::CONTACT_ITEMS_CATEGORY,
            'title' =>  'email'
        ])->update([
            'value' =>  $request->get('email')
        ]);

        PageItem::firstOrCreate([
            'category_id'   =>  PageItem::CONTACT_ITEMS_CATEGORY,
            'title' =>  'address'
        ])->update([
            'value' =>  $request->get('address')
        ]);

        return redirect(route('admin.contactItems.index'))
            ->with('message', 'Data was successfully updated.');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateSiteTitle(Request $request)
    {
        $rules = [
            'title' =>  'max:255'
        ];

        $validator = Validator::make($request->only(array_keys($rules)), $rules);

        if ($validator->fails()) {

            return redirect(route('admin.contactItems.index'))
                ->withErrors($validator->messages());
        }

        PageItem::firstOrCreate([
            'category_id'   =>  PageItem::SITE_TITLE_CATEGORY
        ])->update([
            'title' =>  $request->get('title')
        ]);

        return redirect(route('admin.contactItems.index'))
            ->with('message', 'Site title was successfully updated.');
    }
}
