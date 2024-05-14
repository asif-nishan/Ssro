<?php

namespace App\Http\Requests\Report;

use Illuminate\Foundation\Http\FormRequest;

class TicketReportRequest extends FormRequest
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
            'from_date' => 'required',
            'to_date' => 'required',


        ];
    }
}
