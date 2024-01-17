<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Peralatan;

class PeralatanBackendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.peralatan.index',['peralatans'=>Peralatan::latest()->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.peralatan.create',['peralatans'=>Peralatan::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'file_upload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'keterangan' => 'required'
        ]);
    
        // Pemindahan file ke direktori public/images
        if ($request->hasFile('file_upload')) {
            $namaFile='img_'.time().'_'.$request->file_upload->getClientOriginalName();
            $request->file_upload->move('img', $namaFile);
        }else{
            $namaFile='img_default.png';
        }

        $validatedData['file_upload']=$namaFile;

        Peralatan::create($validatedData);
        return redirect('/peralatan-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('backend.peralatan.edit',[
            'peralatans'=>Peralatan::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $peralatan = Peralatan::find($id);

        $validatedData = $request->validate([
            'nama_barang' => 'required',
            'jumlah' => 'required',
            'file_upload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Gunakan nullable agar bisa mengosongkan file_upload saat edit
            'keterangan' => 'required'
        ]);
    
        if ($request->hasFile('file_upload')) {
            // Jika ada file yang diupload saat edit, validasi sebagai file gambar
            $namaFile = 'img_' . time() . '_' . $request->file_upload->getClientOriginalName();
            $request->file_upload->move('img', $namaFile);
    
            // Hapus gambar lama jika ada dan bukan gambar default
            if ($peralatan->file_upload && $peralatan->file_upload !== 'img_default.png') {
                $imagePath = public_path('/img/' . $peralatan->file_upload);
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
            $validatedData['file_upload'] = $namaFile;
        } else {
            // Jika tidak ada file yang diupload saat edit, gunakan gambar lama
            $validatedData['file_upload'] = $peralatan->file_upload;
        }
    
        Peralatan::where('id', $id)->update($validatedData);
        return redirect('/peralatan-backend')->with('pesan', 'Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Peralatan::destroy($id);
        return redirect('/peralatan-backend')->with('pesan','Data Berhasil di Hapus');
    }
}
