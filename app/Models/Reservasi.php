<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservasi extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'reservasis';
    protected $fillable = ['nama_pelanggan', 'nomor_meja', 'jumlah_orang', 'tanggal_reservasi', 'waktu_reservasi', 'catatan_khusus', 'status'];
}
