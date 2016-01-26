<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Contracts\Bus\SelfHandling;
use Intervention\Image\Facades\Image;

class UploadPhoto extends Job implements SelfHandling
{
    const UPLOAD_PHOTOS_FOLDER = 'assets/admin/upload-images/other-photos/';

    const MAX_PHOTO_WIDTH = 1520;
    const MAX_PHOTO_HEIGHT = 950;

    /**
     * @var
     */
    private $photo;

    /**
     * @var
     */
    private $way = self::UPLOAD_PHOTOS_FOLDER;

    /**
     * UploadPageSlidePhoto constructor.
     * @param $photo
     * @param $way
     */
    public function __construct($photo, $way)
    {
        $this->photo = $photo;
        $this->way   = $way;
    }

    /**
     * @return string
     */
    public function handle()
    {
        $photoName = uniqid() . '.' . $this->photo->getClientOriginalExtension();

        $img = Image::make($this->photo);

        if ($img->width() > self::MAX_PHOTO_WIDTH) {
            $img->resize(self::MAX_PHOTO_WIDTH, null);
        }

        if ($img->height() > self::MAX_PHOTO_HEIGHT) {
            $img->resize(null, self::MAX_PHOTO_HEIGHT);
        }

        $img->save(public_path($this->way . $photoName));

        return $photoName;
    }
}
