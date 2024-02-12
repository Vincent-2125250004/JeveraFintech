<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;


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
            // ...

            'nomor_polisi' => ['required', Rule::unique('mobils', 'Nomor_Polisi')->ignore($this->route('mobil'))],
            'nomor_lambung' => ['required', Rule::unique('mobils', 'Nomor_Lambung')->ignore($this->route('mobil'))],
            'pemilik' => ['required'],
            'nomor_seri' => ['required', Rule::unique('mobils', 'Nomor_Seri')->ignore($this->route('mobil'))],
            'nomor_rangka' => ['required', Rule::unique('mobils', 'Nomor_Rangka')->ignore($this->route('mobil'))],
            'nomor_mesin' => ['required', Rule::unique('mobils', 'Nomor_Mesin')->ignore($this->route('mobil'))],
            'tanggal_masuk' => ['required', 'date'],
            'tanggal_keluar' => ['nullable'],
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
            'nomor_polisi.required' => 'Kolom Nomor Polisi harus diisi.',
            'nomor_polisi.unique' => 'Nomor Polisi sudah terdaftar.',
            'nomor_rangka.required' => 'Kolom Nomor Rangka harus diisi.',
            'nomor_rangka.unique' => 'Nomor Rangka sudah terdaftar.',
            'nomor_mesin.required' => 'Kolom Nomor Mesin harus diisi.',
            'nomor_mesin.unique' => 'Nomor Mesin sudah terdaftar.',
            'nomor_lambung.required' => 'Kolom Nomor Lambung harus diisi.',
            'nomor_lambung.unique' => 'Nomor Lambung sudah terdaftar.',
            'pemilik.required' => 'Kolom Pemilik harus diisi.',
            'nomor_seri.required' => 'Kolom Nomor Seri harus diisi.',
            'nomor_seri.unique' => 'Nomor Seri sudah terdaftar.',
            'tanggal_masuk.required' => 'Kolom Tanggal Masuk harus diisi.',
            'tanggal_masuk.date' => 'Kolom Tanggal Masuk harus berupa tanggal.',
        ];
    }
}
