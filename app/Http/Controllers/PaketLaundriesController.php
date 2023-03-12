<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\PaketLaundries;
use App\Models\Outlet;

class PaketLaundriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = paketlaundries::with('paketoutlet')->get();
        return view('paket-laundry.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = outlet::all();
        return view('paket-laundry.add' , compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        paketlaundries::create($request->all());
        return redirect("/data-laundry")->with('success','Data Laundry berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = paketlaundries::find($id);
        $outlet = outlet::all();
        return view('paket-laundry.edit', compact('data', 'outlet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = paketlaundries::findorfail($id);
        $data->update($request->all());
        return redirect("data-laundry")->with('success', 'Data Paket Laundry berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = PaketLaundries::findorfail($id);
        $delete->delete();
        return back()->with('destroy', "Paket Laundry Berhasil Dihapus");
    }
}
