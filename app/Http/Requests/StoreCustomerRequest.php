<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCustomerRequest extends FormRequest
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
        $user=$this->user();
        return $user!=null && $user->tokenCan('create');
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
        'type'=>['required',Rule::in(['I','B','i','b'])],
        'email'=>['required','email'],
        'address'=>['required'],
        'city'=>['required'],
        'state'=>['required'],
        'postalCode'=>['required'],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
           'postal_code'=>$this->postalCode,
        ]);
    }
}
