<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'travel_id', 'user_id', 'total_harga', 'status_transaksi'
    ];

    protected $hidden = [

    ];

    public function detail(){
        return $this->hasMany(DetailTransaksi::class, 'transaksi_id', 'id');
    }

    public function travel(){
        return $this->belongsTo(Travel::class, 'travel_id', 'id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
