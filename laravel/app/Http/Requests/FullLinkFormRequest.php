<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FullLinkFormRequest extends FormRequest {
    protected $redirect = 'links/create';

    public function rules() {
        return [
            'full_link' => ['required', 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$$/']
        ];
    }
}
