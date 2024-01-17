<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class PembayaranBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.pembayaran.index',['pembayarans'=>Pembayaran::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
       ]);
    

        Pembayaran::create($validatedData);
        return redirect('/pembayaran-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('backend.pembayaran.edit',[
            'pembayarans'=>Pembayaran::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembayaran = Pembayaran::find($id);

        $validatedData = $request->validate([
            'nama' => 'required',
        ]);
      
        Pembayaran::where('id', $id)->update($validatedData);
        return redirect('/pembayaran-backend')->with('pesan', 'Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pembayaran::destroy($id);
        return redirect('/pembayaran-backend')->with('pesan','Data Berhasil di Hapus');
    }
}
