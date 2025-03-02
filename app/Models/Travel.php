<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Travel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'tujuan', 'slug', 'tanggal', 'waktu', 'kuota', 'harga'
    ];

    protected $hidden = [

    ];

    public function kurangiKuota($jumlah)
    {
        $this->kuota = max(0, $this->kuota - $jumlah); // Pastikan tidak negatif
        $this->save();
    }
}
