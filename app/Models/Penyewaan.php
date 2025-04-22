<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class penyewaan extends Model
{
    use HasFactory;

    protected $table = 'penyewaans';
    protected $fillable = [
        'user_id', 'tanggal_sewa', 'tanggal_kembali', 'total_harga',
        'status', 'bukti_pembayaran', 'alamat', 'no_hp', 'jaminan'
    ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alat()
    {
        return $this->belongsToMany(Alat::class, 'detail_pesanan')
                    ->withPivot('kondisi_pengembalian')
                    ->withTimestamps();
    }
}
