<?php

namespace App\Models;

use App\Models\User;
use App\Models\Outlet;
use App\Models\Customer;
use App\Models\PaketLaundries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $primaryKey = "id";
    protected $table = "transaksis";

    protected $fillable = [
        'outlet_id',
        'customer_id',
        'paket_id',
        'user_id',
        'id_invoice',
        'tgl',
        'berat',
        'tgl_bayar',
        'biaya_tambahan',
        'total',
        'diskon',
        'status',
        'keterangan',
    ];

    protected $dates = [
        'tgl',
        'tgl_bayar',
    ];

    public function transaksioutlet()
    {
        return $this->belongsTo(Outlet::class, 'outlet_id', 'id');
    }

    public function transaksicustomer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }

    public function transaksipaket()
    {
        return $this->belongsTo(PaketLaundries::class, 'paket_id', 'id');
    }

    public function transaksiuser()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}