<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class JawabanRequest extends Request {

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
            'id_soal_poll' => 'required',
            'jawaban' => 'required',
        ];
    }

    public function messages() {
        return [
            'id_soal_poll.required' => 'Soal Polling Diperlukan!',
            'jawaban.required' => 'Jawaban Diperlukan!',
        ];
    }

}
