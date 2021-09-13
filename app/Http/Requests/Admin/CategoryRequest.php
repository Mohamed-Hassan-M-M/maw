<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $rules = [
            'title' => 'required|unique:categories',
            'body' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $category = $this->route()->parameter('category');

            $rules['title'] = 'required|unique:categories,id,' . $category->id;
            $rules['image'] = 'sometimes|nullable';

        }//end of if

        return $rules;

    }//end of rules

    public function attributes()
    {
        return [
            'title' => __('categories.title'),
            'body' => __('categories.body'),
            'image' => __('categories.image'),
        ];

    }// end of attributes

}//end of request
