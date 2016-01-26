<?php

namespace App\Http\Controllers\Admin;

use App\Models\PageItem;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class CoffeeItemsController extends Controller
{
    public function __construct()
    {
        return view()->share([
            'activePage'    =>  'coffeeItems'
        ]);
    }
    /**
     * Coffee items page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $coffeeItemsCategory = PageItem::where('category_id', PageItem::COFFEE_ITEMS_CATEGORY)->get();
        $coffeeItems = [];

        foreach ($coffeeItemsCategory as $coffeeItemCategory) {
            $coffeeItems[$coffeeItemCategory->getAttribute('title')] = $coffeeItemCategory->getAttribute('value');
        }

        return view('admin.coffee-items.index', [
            'coffeeItems'   =>  $coffeeItems
        ]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        PageItem::firstOrCreate([
            'category_id'   =>  PageItem::COFFEE_ITEMS_CATEGORY,
            'title' =>  'coffee_cups'
        ])->update([
            'value' =>  $request->get('coffee_cups')
        ]);

        PageItem::firstOrCreate([
            'category_id'   =>  PageItem::COFFEE_ITEMS_CATEGORY,
            'title' =>  'projects'
        ])->update([
            'value' =>  $request->get('projects')
        ]);

        PageItem::firstOrCreate([
            'category_id'   =>  PageItem::COFFEE_ITEMS_CATEGORY,
            'title' =>  'working_days'
        ])->update([
            'value' =>  $request->get('working_days')
        ]);

        PageItem::firstOrCreate([
            'category_id'   =>  PageItem::COFFEE_ITEMS_CATEGORY,
            'title' =>  'clients'
        ])->update([
            'value' =>  $request->get('clients')
        ]);

        return redirect()
                ->back()
                ->with('message', 'Data was successfully updated.');
    }
}
