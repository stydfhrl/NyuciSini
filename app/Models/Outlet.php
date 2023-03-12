<?php

namespace App\Models;

use App\Models\Transaksi;
use App\Models\User;
use App\Models\PaketLaundries;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'notelp',
    ];

    public function outletuser(){
        return $this->hasMany(User::class);
    }

    public function outletpaket(){
        return $this->hasMany(PaketLaundries::class);
    }

    public function outlettransaksi(){
        return $this->hasMany(Transaksi::class);
    }
}
