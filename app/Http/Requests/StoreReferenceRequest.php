<?php

namespace App\Http\Requests;

use App\Helper\Generator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreReferenceRequest extends FormRequest
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
            'title' => 'required',
            'reference' => 'required',
            'job_description'=> 'required|min:3',
            'email' => 'required|email',
            'company_hash' => 'required|existFromHash:companies,id'
        ];
    }

    public function messages()
    {
        return [
          'exist_from_hash' => 'Incorrect company id!'
        ];
    }
}
