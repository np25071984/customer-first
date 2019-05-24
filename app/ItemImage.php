<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class ItemImage extends Model
{
    protected $fillable = ['item_id', 'src'];

    protected static function boot()
    {
        parent::boot();

        static::deleting(function (ItemImage $image) {
            $item = $image->item;
            File::delete(storage_path("item_image_orig/{$item->id}/{$image->src}"));
        });
    }

    /**
     * @return App\Item
     */
    public function item() {
        return $this->belongsTo('App\Item', 'item_id', 'id');
    }

    /**
     * Returns image src with given dimension
     *
     * @return string
     */
    public function getSrc($height, $width) {
        $origSrc = $this->src;
        $pathInfo = pathinfo($origSrc);
        $src = "{$pathInfo['filename']}-{$height}x{$width}.{$pathInfo['extension']}";

        return "/item_img/{$src}";
    }
}
