<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;
use Validator;
use App\Models\User;
use App\Models\Outlet;
use App\Models\Customer;
use App\Models\Transaksi;
use App\Models\PaketLaundries;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = transaksi::all();
        return view('transaksi.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $outlet = Outlet::all();
        $customer = Customer::all();
        $paketlaundry = PaketLaundries::all();
        $user = User::where('level', 'karyawan')->get();
        $data = Transaksi::with('transaksicustomer','transaksioutlet','transaksipaket','transaksiuser')->get();
        return view('transaksi.add', compact('data','customer','outlet','paketlaundry','user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $paketlaundry = PaketLaundries::findOrFail($request->input('paket_id'));
        $harga = $paketlaundry->harga;

        // Hitung total
        $berat = $request->input('berat');
        $biaya_tambahan = $request->input('biaya_tambahan');
        $total = ($berat * $harga) + $biaya_tambahan;

        // Hitung diskon
        $minimal_pembelian1 = 50000;
        $minimal_pembelian2 = 100000;
        $diskon1 = 0.1; // diskon 10% untuk pembelian minimal 50000
        $diskon2 = 0.3; // diskon 30% untuk pembelian minimal 100000

        if ($total >= $minimal_pembelian2) {
            $diskon_value = $diskon2 * $total;
            $total -= $diskon_value;
        } else {
            if ($total >= $minimal_pembelian1) {
                $diskon_value = $diskon1 * $total;
                $total -= $diskon_value;
            } else {
                $diskon_value = 0;
            }
        }

        // Simpan data laundry ke dalam database
        $transaksi = new Transaksi;
        $transaksi->outlet_id = $request->input('outlet_id');
        $transaksi->customer_id = $request->input('customer_id');
        $transaksi->paket_id = $request->input('paket_id');
        $transaksi->user_id = $request->input('user_id');
        $transaksi->id_invoice = $request->input('id_invoice');
        $transaksi->tgl = $request->input('tgl');
        $transaksi->berat = $request->input('berat');
        $transaksi->tgl_bayar = $request->input('tgl_bayar');
        $transaksi->biaya_tambahan = $request->input('biaya_tambahan');
        $diskon = $request->input('diskon', 0); // set default value to 0 if diskon is empty
        $transaksi->diskon = $diskon;
        $transaksi->status = $request->input('status');
        $transaksi->keterangan = $request->input('keterangan');
        $transaksi->total = $total; // Simpan nilai total
        $transaksi->save($request->all());

        return redirect("data-transaksi")->with('success', 'Data Transaksi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $outlet = Outlet::find($id);
        $customer = Customer::find($id);
        $paketlaundry = PaketLaundries::find($id);
        $user = User::find($id);
        $data = Transaksi::with('transaksicustomer','transaksioutlet','transaksipaket','transaksiuser')->find($id);
        return view('transaksi.detail-transaksi', compact('data','customer','outlet','paketlaundry','user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
