<?php

namespace App\Http\Controllers;

use App\ItemImage;
use App\NoImage;
use App\Brand;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as Image;

class ImageController extends Controller
{
    public function createItemImage($file)
    {
        $matches = [];
        preg_match('/(.*)-(\d{0,3}x\d{0,3})\.(jpg|jpeg|png|gif)*/', $file, $matches);
        if (empty($matches)) {
            abort(404);
        }
        list($height, $width) = array_map('intval', explode('x', $matches[2]));

        $src = "{$matches[1]}.{$matches[3]}";
        $image = ItemImage::where('src', $src)->first();
        if (!$image) {
            abort(404);
        }

        // TODO: add dimension white list

        $resizedImage = Image::make(storage_path("item_image_orig/{$image->item->id}/{$src}"));
        $resizedImage->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $resizedImage->save(public_path("/item_img/{$file}"));

        return redirect($image->getSrc($height, $width));
    }

    public function createBrandLogo($file)
    {
        $matches = [];
        preg_match('/(.*)-(\d{0,3}x\d{0,3})\.(jpg|jpeg|png|gif)*/', $file, $matches);
        if (empty($matches)) {
            abort(404);
        }
        list($height, $width) = array_map('intval', explode('x', $matches[2]));

        $src = "{$matches[1]}.{$matches[3]}";
        $brand = Brand::where('logo', $src)->first();
        if (!$brand) {
            abort(404);
        }

        // TODO: add dimension white list

        $resizedImage = Image::make(storage_path("brand_logo_orig/{$src}"));
        $resizedImage->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $resizedImage->save(public_path("/logo/{$file}"));

        return redirect($brand->getLogoSrc($height, $width));
    }

    public function createPlaceholderImage($file)
    {
        $matches = [];
        preg_match('/noimage-(\d{0,3}x\d{0,3})\.jpeg/', $file, $matches);
        if (empty($matches)) {
            abort(404);
        }
        list($height, $width) = array_map('intval', explode('x', $matches[1]));

        // TODO: add dimension white list

        $resizedImage = Image::make(storage_path("noimage.jpeg"));
        $resizedImage->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $resizedImage->save(public_path("/img/{$file}"));

        return redirect("/img/{$file}");
    }

}