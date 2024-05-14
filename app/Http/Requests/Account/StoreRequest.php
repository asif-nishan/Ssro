<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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

            'airlines' => 'required',
            'current_balance' => 'required',
            'monthly_payment' => 'required',
            'purchase_price' => 'required',
            'profit_from_sell' => 'required',
            'bonus_amount' => 'required',
//            'rest_amount_of_current_month' => 'required',
//            'total_profit' => 'required',
//            'pnr' => 'required',

        ];
    }
}
