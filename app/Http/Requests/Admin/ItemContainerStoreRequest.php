<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ItemContainerStoreRequest extends FormRequest
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
        $container = $this->route('container');

        return [
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'name' => 'required|min:3|unique:item_containers,name' . ($container ? ",{$container->id},id" : ''),
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
            'category_id.required' => 'Необходимо выбрать категорию',
            'brand_id.required' => 'Необходимо выбрать производителя',
            'name.required' => 'Необходимо указать имя контейнера',
            'name.min' => 'Контейнер с таким именем уже существует',
            'name.unique' => 'Имя контейнера должно быть уникальным',
        ];
    }
}
