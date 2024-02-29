<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataRuteStoreRequest extends FormRequest
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
            'asal_rute'=>['required'],
            'tujuan_rute'=>['required'],
            'gerbang' =>['required'],
            'kilometer_rute'=>['required'],
            'harga_rute'=>['required'],
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
            'asal_rute.required' => 'Kolom Asal Rute harus diisi.',
            'tujuan_rute.required' => 'Kolom Tujuan Rute harus diisi.',
            'gerbang.required' => 'Kolom Gerbang harus diisi.',
            'kilometer_rute.required' => 'Kolom Kilometer Rute harus diisi.',
            'harga_rute.required' => 'Kolom Harga Rute harus diisi.',
        ];
    }
}
