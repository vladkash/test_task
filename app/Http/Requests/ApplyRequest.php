<?php

namespace App\Http\Requests;

use App\Rules\EducationLevelRule;
use Illuminate\Foundation\Http\FormRequest;

class ApplyRequest extends FormRequest
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
            'name' => 'required|string|max:80',
            'surname' => 'required|string|max:80',
            'email' => 'required|email|max:80',
            'phone' => 'required|string|min:16|max:16',
            'education_level' => [
                'required',
                new EducationLevelRule()
            ],
            'ip' => 'required|ipv4',
            'utm' => 'nullable'
        ];
    }
}
