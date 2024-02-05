<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataMobilStoreRequest extends FormRequest
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
            'nomor_polisi' => ['required'],
            'nomor_lambung' => ['required'],
            'pemilik' => ['required'],
            'nomor_seri' => ['required'],
            'nomor_rangka' => ['required'],
            'nomor_mesin' => ['required'],
            'tanggal_masuk' => ['required', 'date'],
            'tanggal_keluar' => ['nullable'],
            
        ];
    }
}
