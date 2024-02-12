<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataKontakStoreRequest extends FormRequest
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
            'nama_kontak'=>['required'],
            'nomor_telepon'=>['required'],
            'tipe_kontak'=>['required'],
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
            'nama_kontak.required' => 'Kolom Nama Kontak harus diisi.',
            'nomor_telepon.required' => 'Kolom Nomor Telepon harus diisi.',
            'tipe_kontak.required' => 'Kolom Tipe Kontak harus diisi.',
        ];
    }
}
