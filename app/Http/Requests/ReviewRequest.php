<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
        return [
            "user_id" => "required|string",
            "user_name" => "required|string",
            "artisan_id" => "required|string",
            "content" => "required|string",
            "service_id" => "required|string",
            "likes" =>"required|string"
        ];
    }
}
