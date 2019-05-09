<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Returns all subcategories
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children() {
        return $this->hasMany('App\Category', 'parent_id', 'id')->orderBy('order');
    }

    /**
     * Gets actual slug
     *
     * @return App\CategorySlug
     */
    public function slug() {
        return $this->hasOne('App\CategorySlug', 'category_id', 'id')->
            orderBy('created_at', 'desc')->limit(1);
    }
}
