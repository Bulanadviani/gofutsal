<?php

namespace App\Http\Controllers;
use App\Models\Peralatan;

use Illuminate\Http\Request;

class PeralatanController extends Controller
{
    public function index()
    {
      return view('frontend.peralatan',['peralatans'=>Peralatan::latest()->paginate(10)]);
    }
}
