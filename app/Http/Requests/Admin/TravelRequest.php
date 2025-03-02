<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TravelRequest extends FormRequest
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
            'tujuan' => 'required|max:255',
            'tanggal' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'kuota'  => 'required|integer',
            'harga'  => 'required|numeric|min:0'
        ];
    }
}
