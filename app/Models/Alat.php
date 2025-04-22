<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class alat extends Model
{
    use HasFactory;

    protected $table = 'alats';
    protected $primaryKey = 'id';
    protected $fillable = ['nama', 'jenis', 'harga_sewa', 'ketersediaan', 'gambar', 'deskripsi'];
    public $timestamps = true;

    public function penyewaans()
    {
        return $this->belongsToMany(Penyewaan::class, 'detail_pesanan')
                    ->withPivot('kondisi_pengembalian')
                    ->withTimestamps();
    }
}
