<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Model;

class PageItem extends Model {

    const PAGE_SLIDES_CATEGORY = 1;
    const HOW_IT_WORKS_HEADER_CATEGORY = 2;
    const HOW_IT_WORKS_CATEGORY = 3;
    const IF_YOU_ITEMS_CATEGORY = 4;
    const COFFEE_ITEMS_CATEGORY = 5;
    const MENU_LINKS_CATEGORY = 6;
    const SITE_TITLE_CATEGORY = 7;
    const CONTACT_ITEMS_CATEGORY = 8;
    const SOCIAL_LINKS_CATEGORY = 9;

	
	//admin images
    const PHOTO_SLIDES_FOLDER = 'assets/admin/upload-photos/slide-photos/';
    const HOW_IT_WORKS_PHOTOS_FOLDER = 'assets/admin/upload-photos/how-it-works-photos/';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'page_items';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title',
        'value',
        'description',
        'ordinal_position',
        'photo_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'    =>  'integer'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * @return string
     */
    public function getHowItWorksPhotoUrl()
    {
        return self::HOW_IT_WORKS_PHOTOS_FOLDER . $this->getAttribute('photo_url');
    }

    /**
     * @return string
     */
    public function getPageSlidePhotoUrl()
    {
        return self::PHOTO_SLIDES_FOLDER . $this->getAttribute('photo_url');
    }

}