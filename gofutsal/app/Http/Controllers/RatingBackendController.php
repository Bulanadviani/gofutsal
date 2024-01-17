<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Rating;
use App\models\User;

class RatingBackendController extends Controller
{
    public function index()
    {
        $data = [
            'users' => User::all(),
            'ratings' => Rating::all(),
        ];

        return view('backend.rating.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.rating.create',['users'=>User::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'ulasan' => 'required',
        ]);

        Rating::create($validatedData);
        return redirect('/rating-backend')->with('pesan','Data Berhasil di Simpan');
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
        return view('backend.rating.edit',[
            'ratings'=>Rating::find($id),
            'users'=>User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rating = Rating::find($id);

        $validatedData = $request->validate([
            'user_id' => 'required',
            'ulasan' => 'required',
        ]);
        
        Rating::where('id', $id)->update($validatedData);
        return redirect('/rating-backend')->with('pesan', 'Data Berhasil di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Rating::destroy($id);
        return redirect('/rating-backend')->with('pesan','Data Berhasil di Hapus');
    }
}


