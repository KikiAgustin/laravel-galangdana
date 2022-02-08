<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class DonationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function messages()
    {
        return [
            'required'  => 'Kolom ini wajib diisi',
            'numeric'   => 'Hanya boleh memasukan nomor',
            'min'       => 'Minimal Donasi Rp. 10.000',
            'max'       => 'Maksimalh 255 Karakter'
        ];
    }

    public function rules()
    {
        return [
            'namalengkap'         => 'required|max:255',
            'email'               => 'required',
            'jumlahdonasi'        => 'required|numeric|min:10000'
        ];
    }
}
