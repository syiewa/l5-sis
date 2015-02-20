<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class FotoRequest extends Request {

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
        if (Request::has('id_foto')) {
            $foto = 'image';
            return [
                'id_album' => 'required',
                'foto' => $foto,
            ];
        }
        if (Request::has('data')) {
            $foto = 'required|image';
            return [
                'data' => 'required',
                'file' => $foto,
            ];
        }
        return [
            'id_album' => 'required',
            'foto' => 'required|image',
        ];
    }

    public function messages() {
        return [
            'id_album.required' => 'Album Diperlukan!',
            'data.required' => 'Album Diperlukan',
            'file.required' => 'Foto Diperlukan',
            'file.required' => 'File foto yang diperbolehkan hanya (jpeg, png, bmp, gif, atau svg)!',
            'foto.required' => 'Foto Diperlukan!',
            'foto.image' => 'File foto yang diperbolehkan hanya (jpeg, png, bmp, gif, atau svg)!',
        ];
    }

}
