<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ItemStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $item = $this->route('item');

        return [
            'article' => 'required|min:3|unique:items,article' . ($item ? ",{$item->id},id" : ''),
            'name' => 'required|min:3|unique:items,name' . ($item ? ",{$item->id},id" : ''),
            'slug' => 'required|max:150|unique:items_slug,value' . ($item ? ",{$item->slug->id},id" : ''),
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'article.required' => 'Укажите артикул товара',
            'article.min' => 'Артикул не может быть меньше трех символов',
            'article.unique' => 'Товар с таким артикулом уже существует',
            'name.required' => 'Укажите название товара',
            'name.min' => 'Название не может быть меньше трех символов',
            'name.unique' => 'Товар с таким названием уже существует',
            'slug.required' => 'Введите значение полря Slug',
            'slug.max' => 'Slug не может быть больше 150 символов',
            'slug.unique' => 'Товар с таким Slug уже существует',
            'image.*' => 'Все иозбражения должны быть формата jpeg/jpg/png/gif не больше 2Мб',
        ];
    }
}
