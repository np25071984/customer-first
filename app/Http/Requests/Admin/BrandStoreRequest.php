<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BrandStoreRequest extends FormRequest
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
        $brand = $this->route('brand');

        return [
            'name' => 'required|min:3|unique:brands,name' . ($brand ? ",{$brand->id},id" : ''),
            'slug' => 'required|max:150|unique:brands_slug,value' . ($brand ? ",{$brand->slug->id},id" : ''),
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
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
            'name.required' => 'Укажите название бренда',
            'name.min' => 'Название бренда не может быть меньше трех символов',
            'name.unique' => 'Бренд с таким названием уже существует',
            'slug.required' => 'Введите значение полря Slug',
            'slug.max' => 'Slug не может быть больше 150 символов',
            'slug.unique' => 'Бренд с таким Slug уже существует',
            'logo.mimes' => 'Допускаются только файлы формата jpeg, png и gif',
            'logo.max' => 'Файл логотипа слишком большой. Оптимизируйте его размер и повторите попытку.',
            'logo.unique' => 'Файл логатипа с аналогичным названием уже существует в системе',
        ];
    }

}
