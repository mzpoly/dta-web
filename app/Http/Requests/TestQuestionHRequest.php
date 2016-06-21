<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class TestQuestionHRequest extends Request
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
            'testid' => 'required|numeric',
            'questionid' => 'required|numeric',
            'questionnumber' => 'required|numeric',
            'answeruser' => 'numeric'
        ];
    }
}
