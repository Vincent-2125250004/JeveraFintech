<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataAkunStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama_akun'=>['required'],
            'kategori_akun'=>['required'],
            'tipe_transaksi'=>['required'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nama_akun.required' => 'Kolom Nama Akun harus diisi.',
            'kategori_akun.required' => 'Kolom Kategori Akun harus diisi.',
        ];
    }
}
