<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image as Img;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function saveImage($request, $dir, $width, $height)
    {
        $image = $request;
        $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $image->getClientOriginalExtension();
        $imageName = $name . time() . rand(1, 10000) . '.' . $extension;
        $destination = public_path("img/user/" . auth()->id() . "/{$dir}");
        $dir = 'img/user/' . auth()->id() . "/{$dir}";
        if (!Storage::disk('public')->exists($destination)) {
            Storage::disk('public')->makeDirectory($dir);
        }
        $img = Img::make($image->path());
        $img->resize($width, $height, function ($contraint) {
            $contraint->aspectRatio();
        })->save($destination . '/' . $imageName);
        return $imageName;
    }

    public function removeImage($request, $dir)
    {
        $oldImage = $request;
        $dir = 'img/user/' . auth()->id() . "/{$dir}";
        Storage::disk('public')->delete($dir . "/{$oldImage}");
    }

    public function removeDir($userid = '', $roomid = '')
    {
        if ($userid) {
            $dir = 'img/user/' . $userid;
        }

        if ($roomid) {
            $dir = 'img/room/' . $roomid;
        }

        if (Storage::disk('public')->exists($dir)) {
            Storage::disk('public')->deleteDirectory($dir);
        }
    }
}
