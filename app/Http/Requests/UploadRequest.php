<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UploadRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        if (Request::hasFile('file')) {
            return [ 
                'data' => 'required',
                'file' => 'required'
            ];
        } 
        if (Request::has('id_download')) {
            return [
                'judul_file' => 'required',
            ];
        }
        return [
            'judul_file' => 'required',
            'file' => 'required',
        ];
    }

    public function messages() {
        return [
            'data.required' => 'Judul Upload Diperlukan',
            'judul_file.required' => 'Judul Upload Diperlukan!',
            'file.required' => 'File Diperlukan',
        ];
    }

}
