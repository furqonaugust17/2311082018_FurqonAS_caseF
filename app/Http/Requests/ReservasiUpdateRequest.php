<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReservasiUpdateRequest extends FormRequest
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
        $id = $this->route('reservasi')->id;

        return [
            'nama_pelanggan' => ['required', 'string', 'max:255'],
            'nomor_meja' => ['required', 'integer', 'min:1',  Rule::unique('reservasis') // table 'reservasis'
                ->where(function ($query) {
                    return $query
                        ->where('tanggal_reservasi', $this->tanggal_reservasi)
                        ->where('waktu_reservasi', date('H:i', strtotime($this->waktu_reservasi)));
                })->ignore($id)],
            'jumlah_orang' => ['required', 'integer', 'min:1'],
            'tanggal_reservasi' => ['required', 'date', 'after_or_equal:today'],
            'waktu_reservasi' => ['required', 'date_format:g:i A'],
            'catatan_khusus' => ['nullable', 'string', 'max:500'],
            'status' => ['required', 'in:terjadwal,hadir,dibatalkan'],
        ];
    }
}
