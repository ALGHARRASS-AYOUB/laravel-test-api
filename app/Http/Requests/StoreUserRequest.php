<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // making authorization basing on sanctum tokens
        //ensuring that there is a logged in user
     return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>['required'],
            'role'=>['required',Rule::in(['user','special_user'])],
            'email'=>['required','email'],
            'password'=>['required'],
            'cpassword'=>['required','same:password'],
        ];
    }

//    protected function prepareForValidation()
//    {
//        $this->merge([
//           'postal_code'=>$this->postalCode,
//        ]);
//    }
}
