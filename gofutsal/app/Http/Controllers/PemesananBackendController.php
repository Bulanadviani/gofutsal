<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\User;
use App\Models\Lapangan;
use App\Models\Pembayaran;
use App\Models\Peralatan;

class PemesananBackendController extends Controller
{
    public function index()
    {
        return view('backend.pemesanan.index',['pemesanans'=>Pemesanan::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'users' => User::all(),
            'lapangans' => Lapangan::all(),
            'peralatans' => Peralatan::all(),
            'pembayarans' => Pembayaran::all(),
        ];

        return view('backend.pemesanan.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'lapangan_id' => 'required',
            'waktu' => 'required',
            'peralatan_id' => 'required',
            'harga' => 'required',
            'pembayaran_id' => 'required',
        ]);
    
        // Pemindahan file ke direktori public/images
        
        Pemesanan::create($validatedData);
        return redirect('/pemesanan-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('backend.pemesanan.edit',[
            'pemesanans'=>Pemesanan::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pemesanan = Pemesanan::find($id);

        $validatedData = $request->validate([
            'user_id' => 'required',
            'lapangan_id' => 'required',
            'waktu' => 'required',
            'peralatan_id' => 'required',
            'harga' => 'required',
            'pembayaran_id' => 'required',
        ]);
    
    
        Pemesanan::where('id', $id)->update($validatedData);
        return redirect('/pemesanan-backend')->with('pesan', 'Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pemesanan::destroy($id);
        return redirect('/pemesanan-backend')->with('pesan','Data Berhasil di Hapus');
    }
}
