<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'title' => 'required|unique:articles',
            'body' => 'required',
            'category_id' => 'required',
            'image' => 'required',
            'file' => 'required',
            'time_to_read' => 'required',
            'status' => 'required',
        ];

        if (in_array($this->method(), ['PUT', 'PATCH'])) {

            $article = $this->route()->parameter('article');

            $rules['title'] = 'required|unique:articles,id,' . $article->id;
            $rules['file'] = 'sometimes|nullable';

        }//end of if

        return $rules;

    }//end of rules

    public function attributes()
    {
        return [
            'title' => __('articles.title'),
            'body' => __('articles.body'),
            'category_id' => __('categories.category'),
            'file' => __('articles.file'),
            'status' => __('articles.status'),
        ];

    }// end of attributes

}//end of request
