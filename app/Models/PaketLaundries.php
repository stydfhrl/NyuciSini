<?php

namespace App\Models;

use App\Models\Outlet;
use App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketLaundries extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "paket_laundries";

    protected $fillable = [
        'outlet_id',
        'jenis',
        'nama_paket',
        'harga',
    ];

    public function paketoutlet()
    {
        return $this->belongsTo(outlet::class, 'outlet_id', 'id');
    }

    public function pakettransaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
