<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategorySlug extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories_slug';

    public $timestamps = false;

    /**
     * @return App\Category
     */
    public function category() {
        return $this->hasOne('App\Category', 'id', 'category_id')->with('slug');
    }

}
