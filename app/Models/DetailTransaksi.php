<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailTransaksi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'transaksi_id', 'nama', 'no_hp'
    ];

    protected $hidden = [

    ];

    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'id');
    }
}
