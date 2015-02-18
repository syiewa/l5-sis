<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PengumumanRequest extends Request {

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
            'judul_pengumuman' => 'required',
            'isi' => 'required',
        ];
    }

    public function messages() {
        return [
            'judul_pengumuman.required' => 'Judul Pengumuman Diperlukan!',
            'isi.required' => 'Isi Diperlukan!',
        ];
    }

}
