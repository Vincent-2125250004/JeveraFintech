<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DataPemasukanRequest extends FormRequest
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
            'nama_kontak' => ['required'],
            'dari_akun' => ['required'],
            'ke_akun' => ['required'],
            'nominal_pemasukan'=>['required'],
            'tanggal_pemasukan'=>['required', 'date'],
            'deskripsi'=>['required'],
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
            'nama_kontak.required' => 'Nama Kontak tidak boleh kosong',
            'dari_akun.required' => 'Dari Akun tidak boleh kosong',
            'ke_akun.required' => 'Ke Akun tidak boleh kosong',
            'nominal_pemasukan.required' => 'Nominal Pemasukan tidak boleh kosong',
            'tanggal_pemasukan.required' => 'Tanggal Pemasukan tidak boleh kosong',
            'tanggal_pemasukan.date' => 'Tanggal Pemasukan harus berupa tanggal',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
        ];
    }
}
