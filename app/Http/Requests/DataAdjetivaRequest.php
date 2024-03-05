<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataAdjetivaRequest extends FormRequest
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
            'nominal_adjetiva'=>['required'],
            'tanggal_adjetiva'=>['required', 'date'],
            'deskripsi'=>['required'],
        ];
    }
}
