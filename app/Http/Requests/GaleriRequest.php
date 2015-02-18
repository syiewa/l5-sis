<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GaleriRequest extends Request {

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
            'nama_album' => 'required',
        ];
    }

    public function messages() {
        return [
            'nama_album.required' => 'Nama album Diperlukan!',
        ];
    }

}
