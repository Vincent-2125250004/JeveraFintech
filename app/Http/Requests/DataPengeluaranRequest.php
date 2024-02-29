<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DataPengeluaranRequest extends FormRequest
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
            'nominal_pengeluaran'=>['required'],
            'tanggal_pengeluaran'=>['required', 'date'],
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
            'nominal_pengeluaran.required' => 'Nominal Pengeluaran tidak boleh kosong',
            'tanggal_pengeluaran.required' => 'Tanggal Pengeluaran tidak boleh kosong',
            'tanggal_pengeluaran.date' => 'Tanggal Pengeluaran harus berupa tanggal',
            'deskripsi.required' => 'Deskripsi tidak boleh kosong',
        ];
    }
}
