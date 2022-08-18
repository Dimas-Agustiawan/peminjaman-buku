<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Buku_Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'id_buku' => 'required|unique:buku,id|max:255',
            'kategori' => 'required',
            'judul_buku' => 'required',
            'pengarang' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi cuy!!!',
            'min' => ':attribute harus diisi minimal :min karakter ya cuy!!!',
            'unique' => ':attribute harus diisi unik karakter ya cuy!!!',
        ];
    }
}
