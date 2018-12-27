<?php  

namespace App\Logics;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Filters\FilterInterface;
use Image;

class ImageEditor
{
    // public function __construct()
    // {
    // }

    public function checkFilters($request) { 
        // print_r($request);
        // print_r(json_decode($request['filter']));
        // print_r(json_decode($request['filter'])->contrast->brightness);

        // foreach (json_decode($request['filter']) as $key => $value) {
        //     print_r($key);
        //     print_r($value);
        // }

        // exit();
        $storedImage = $this->store($request['path']);
        if(key_exists('filter', $request)) {
            $filter = json_decode($request['filter']);
            foreach ($filter as $key => $value) {
                switch ($key) {
                    case 'resize':
                        $resizeResult = $this->resize(
                            $storedImage,
                            $filter->resize->width, 
                            $filter->resize->height
                        );
                        break;
                    case 'blur':
                        $blurResult = $this->blur(
                            $storedImage,
                            $filter->blur->radius
                        );
                        break;
                    case 'contrast':
                        $contrastResult = $this->contrast(
                            $storedImage,
                            $filter->contrast->brightness
                        );
                        break;
                    case 'crop':
                        $cropResult = $this->crop(
                            $storedImage,
                            $filter->crop->width,
                            $filter->crop->height,
                            $filter->crop->x,
                            $filter->crop->y
                        );
                        break;
                    default:
                        echo 'default';
                }
            };            
        }
        return $storedImage;
    }

    public function store($img) {
        $folderDestination = 'public/img';

        $imageFullTitle = $img->getClientOriginalName();
        $imageTitle = pathinfo($img->getClientOriginalName(), PATHINFO_FILENAME);
        $imageExtension = $img->getClientOriginalExtension();
        $newImageName = $imageTitle.'_'.time().'.'.$imageExtension;

        // Upload File
        $img->storeAs($folderDestination, $newImageName);

        return $newImageName;
    }

    public function resize($title, $width, $height) {
        return Image::make('storage/img/' . $title)
                    ->resize($width, $height, function($img) { $img->aspectRatio(); })
                    ->save();
    }

    public function blur($title, $radius) {
        return Image::make('storage/img/' . $title)->blur($radius)->save();
    }

    public function contrast($title, $brightness) {
        return Image::make('storage/img/' . $title)->contrast($brightness)->save();
    }

    public function crop($title, $width, $height, $x, $y) {
        return Image::make('storage/img/' . $title)->crop($width, $height, $x, $y)->save();
    }
}






/*

{
  "resize" : {
    "width": 100,
    "height": 100
  },
  "contrast": {
    "brightness": 65
  },
  "crop": {
    "width": 100,
    "height": 100,
    "x": 100,
    "y": 100
  },
  "blur": {
    "radius": 5
  }
}

*/