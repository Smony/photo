<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\PageItem;
use App\Models\PageItemCategory;

class IndexController extends Controller
{
    /**
     * Client's index page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $pageItems = PageItem::orderBy('ordinal_position')->get();
        $categories = [];
        $coffeeItems = [];
        $contactItems = [];
        $socialLinks = [];

        foreach ($pageItems as $item) {
            $categories[$item->getAttribute('category_id')][] = $item;
        }

        if (isset($categories[PageItem::COFFEE_ITEMS_CATEGORY])) {

            foreach ($categories[PageItem::COFFEE_ITEMS_CATEGORY] as $coffeeItem) {
                $coffeeItems[$coffeeItem->getAttribute('title')] = $coffeeItem->getAttribute('value');
            }
        }

        if (isset($categories[PageItem::CONTACT_ITEMS_CATEGORY])) {

            foreach ($categories[PageItem::CONTACT_ITEMS_CATEGORY] as $contactItem) {
                $contactItems[$contactItem->getAttribute('title')] = $contactItem->getAttribute('value');
            }
        }

        if (isset($categories[PageItem::SOCIAL_LINKS_CATEGORY])) {

            foreach ($categories[PageItem::SOCIAL_LINKS_CATEGORY] as $socialLink) {
                $socialLinks[$socialLink->getAttribute('title')] = $socialLink->getAttribute('value');
            }
        }

        $getSiteTitle = isset($categories[PageItem::SITE_TITLE_CATEGORY]) ? array_values($categories[PageItem::SITE_TITLE_CATEGORY])[0] : [];
        $siteTitle = isset($getSiteTitle['title']) && $getSiteTitle['title'] != null ? $getSiteTitle['title'] : 'LOREM';

        return view('client.index.index', [
            'pageSlideItems'    =>  isset($categories[PageItem::PAGE_SLIDES_CATEGORY])  ? $categories[PageItem::PAGE_SLIDES_CATEGORY] : [],
            'howItWorkItems'    =>  isset($categories[PageItem::HOW_IT_WORKS_CATEGORY]) ? $categories[PageItem::HOW_IT_WORKS_CATEGORY] : [],
            'ifYouItems'        =>  isset($categories[PageItem::IF_YOU_ITEMS_CATEGORY]) ? $categories[PageItem::IF_YOU_ITEMS_CATEGORY] : [],
            'menuLinks'         =>  isset($categories[PageItem::MENU_LINKS_CATEGORY]) ? $categories[PageItem::MENU_LINKS_CATEGORY] : [],
            'howItWorkHeader'   =>  isset($categories[PageItem::HOW_IT_WORKS_HEADER_CATEGORY]) ? array_values($categories[PageItem::HOW_IT_WORKS_HEADER_CATEGORY])[0] : [],
            'siteTitle'         =>  $siteTitle,
            'coffeeItems'       =>  $coffeeItems,
            'contactItems'      =>  $contactItems,
            'socialLinks'       =>  $socialLinks
        ]);
    }
}