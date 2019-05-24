<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    protected $fillable = ['name', 'description', 'logo'];

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
