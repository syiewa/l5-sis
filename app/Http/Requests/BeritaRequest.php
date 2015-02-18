<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BeritaRequest extends Request {

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
            'judul_berita' => 'required',
            'isi' => 'required',
        ];
    }

    public function messages() {
        return [
            'judul_berita.required' => 'Judul Pengumuman Diperlukan!',
            'isi.required' => 'Isi Diperlukan!',
        ];
    }

}
