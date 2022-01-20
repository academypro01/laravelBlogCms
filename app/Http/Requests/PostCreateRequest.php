<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class PostCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::check() && Auth::user()->isAdmin()) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function prepareForValidation()
    {
        if($this->input('slug')) {
            $this->merge(['slug' => make_slug($this->input('slug'))]);
        }else{
            $this->merge(['slug' => make_slug($this->input('title'))]);
        }
    }
    public function rules()
    {
        return [
            'title' => ['required'],
            'slug' => ['unique:posts'],
            'description' => ['required','min:20'],
            'meta_title' => ['required'],
            'meta_description' => ['required'],
            'category' => ['required'],
            'status' => ['required'],
            'photo' => ['required']
        ];
    }
}
