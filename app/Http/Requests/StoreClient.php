<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClient extends FormRequest
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
            'first_name'          => 'required|string|max:50',
            'last_name'           => 'required|string|max:50',
            'dob'                 => 'required|date',
            'mobile'              => 'required',
            'email'               => 'required|email',
            'nationality'         => 'required|string|max:50',
            'address'             => 'required|string|max:120',
            'gender'              => 'required|in:Female,Male',
            'country'             => 'required|string|max:50',
            'city'                => 'required|string|max:50',
            'state'               => 'required|string|max:50',
            'zip'                 => 'required',
        ];
    }
}
