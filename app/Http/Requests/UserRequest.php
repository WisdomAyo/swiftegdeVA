<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            "fullname" => "required|string",
            "email"=> "required|string|unique:users,email",
            "password"=> "required|string",
            "gender" => "required|string",
            "phone"  => "required|string",
            "DateOfBirth" => "required|string",
            "StreetAddress" => "required|string",
            "state_area" => "required|string",
            "state" => "required|string",
            "WorkExperience" => "required|string",
            "BusinessCategory" => "required|string",
            "WebsiteAddress" => "required|string",
            "ServiceDescription" => "required|string",
        ];
    }
}
