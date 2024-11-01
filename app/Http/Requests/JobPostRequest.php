<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobPostRequest extends FormRequest
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
            "user_id"=> "required|int",
            "category_id"=> "required|int",
            "state_id"=> "required|int",
            "city_id"=> "required|int",
            "type"=> "required|string",
            "descriptions"=> "required|string",
            "amount"=> "required|int",
            "title"=> "required|string",
            "image"=> "required|string",
            "availabilty"=> "required|string",
            "years-of-experience"=> "required|string",
            "age-range"=> "required|string",
        ];
    }
}
