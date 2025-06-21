<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'barang_id',
        'jumlah',
        'total_harga',
        'tanggal',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    protected $casts = [
        'tanggal' => 'date',
    ];
}
