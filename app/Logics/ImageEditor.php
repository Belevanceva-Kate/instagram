<?php  

namespace App\Logics;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
// use Intervention\Image\GD\Driver;
// use Intervention\Image\Facades\Image;
use Intervention\Image\Filters\FilterInterface;
use Image;

class ImageEditor
{
    // public function __construct()
    // {
    // }

    public function checkFilters($request) { 
        $storedImage = $this->store($request['path']);
        if(key_exists('filter', $request)) {
            foreach ($request['filter'] as $key => $value) {
                switch ($key) {
                    case 'resize':
                        $resizeResult = $this->resize(
                            $storedImage,
                            $request['filter']['resize']['width'], 
                            $request['filter']['resize']['height']
                        );
                        break;
                    case 'blur':
                        $blurResult = $this->blur(
                            $storedImage,
                            $request['filter']['blur']['radius']
                        );
                        break;
                    case 'contrast':
                        $contrastResult = $this->contrast(
                            $storedImage,
                            $request['filter']['contrast']['brightness']
                        );
                        break;
                    case 'crop':
                        $cropResult = $this->crop(
                            $storedImage,
                            $request['filter']['crop']['width'],
                            $request['filter']['crop']['height'],
                            $request['filter']['crop']['x'],
                            $request['filter']['crop']['y']
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