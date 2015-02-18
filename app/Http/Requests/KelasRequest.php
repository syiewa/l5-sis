<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class KelasRequest extends Request {

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
            'nama_kelas' => 'required',
            'tahun_ajaran' => 'required',
        ];
    }

    public function messages() {
        return [
            'nama_kelas.required' => 'Nama Kelas Diperlukan!',
            'tahun_ajaran.required' => 'Tahun Ajaran Diperlukan!',
        ];
    }

}
