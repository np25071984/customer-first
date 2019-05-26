<?php

namespace App;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'description', 'logo'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (Brand $brand) {
            foreach ($brand->containers as $container) {
                $container->delete();
            }

            // delete the original logo image
            $logopath = storage_path("brand_logo_orig/{$brand->logo}");
            if (!$brand->logo || !File::exists($logopath)) {
                File::delete($logopath);
            }

            // delete the resized logo images
            $pathinfo = pathinfo(public_path("logo/{$brand->logo}"));
            File::delete(File::glob("{$pathinfo['dirname']}/{$pathinfo['filename']}-*"));
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function containers()
    {
        return $this->hasMany('App\ItemContainer', 'brand_id', 'id');
    }

    /**
     * Gets actual slug
     *
     * @return App\CategorySlug
     */
    public function slug() {
        return $this->hasOne('App\BrandSlug', 'brand_id', 'id')->latest();
    }

    /**
     * Returns logo src with given dimension
     *
     * @return string
     */
    public function getLogoSrc($height, $width) {
        $origSrc = $this->logo;
        $pathInfo = pathinfo($origSrc);
        $src = "{$pathInfo['filename']}-{$height}x{$width}.{$pathInfo['extension']}";

        return "/logo/{$src}";
    }
}
