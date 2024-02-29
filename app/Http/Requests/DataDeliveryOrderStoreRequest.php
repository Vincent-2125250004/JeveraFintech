<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DataDeliveryOrderStoreRequest extends FormRequest
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
            'no_do' => ['required', Rule::unique('delivery_orders', 'NO_Do')->ignore($this->route('do'))],
            'tanggal_do' => ['required' ,'date'],
            'nomor_polisi' => ['required'],
            'nomor_lambung' => ['required'],
            'sjb_muat'=>['required'],
            'sjb_bongkar'=>['required'],
            'rute'=>['required'],
            'tonase'=>['required'],
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
            'no_do.required' => 'Kolom Nomor DO harus diisi.',
            'no_do.unique' => 'Nomor DO sudah terdaftar.',
            'tanggal_do.required' => 'Kolom Tanggal DO harus diisi.',
            'tanggal_do.date' => 'Kolom Tanggal DO harus berupa tanggal.',
            'nomor_polisi.required' => 'Kolom Nomor Polisi harus diisi.',
            'nomor_lambung.required' => 'Kolom Nomor Lambung harus diisi.',
            'sjb_muat.required' => 'Kolom SJB Muat harus diisi.',
            'sjb_bongkar.required' => 'Kolom SJB Bongkar harus diisi.',
            'rute.required' => 'Kolom Rute harus diisi.',
            'tonase.required' => 'Kolom Tonase harus diisi.',
        ];
    }
}
