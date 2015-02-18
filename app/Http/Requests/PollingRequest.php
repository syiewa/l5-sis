<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PollingRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return TRUE;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'soal_poll' => 'required',
            'status' => 'required',
        ];
    }

    public function messages() {
        return [
            'soal_poll.required' => 'Soal Polling Diperlukan!',
            'status.required' => 'Status Diperlukan!',
        ];
    }

}
