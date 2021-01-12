<?php

namespace App\Http\Requests\VacationController;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'start' => 'required|string|date_format:Y-m-d',
            'finish' => 'required|string|date_format:Y-m-d|after:start',
        ];
    }

    public function attributes()
    {
        return [
            'start' => 'Начало отпуска',
            'finish' => 'Окончание отпуска',
        ];
    }
}
