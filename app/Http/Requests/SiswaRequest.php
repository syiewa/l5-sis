<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SiswaRequest extends Request {

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
            'id_kelas' => 'required',
            'nis' => 'required|numeric|unique:tbl_siswa,nis,'.Request::get('id_siswa').',id_siswa',
            'nama_siswa' => 'required',
        ];
    }

    public function messages() {
        return [
            'id_kelas.required' => 'Kelas Diperlukan!',
            'nis.required' => 'Nomor induk siswa Diperlukan!',
            'nis.numeric' => 'Nomor induk siswa harus berupa angka!',
            'nama_siswa.required' => 'Nama Siswa Diperlukan!',
        ];
    }

}
