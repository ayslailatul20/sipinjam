<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlatRequest;
use App\Models\Alat;
use Illuminate\Http\Request;

class AlatController extends Controller
{
        public function index(Request $request)
    {
        $data = $request->validate([
            'q' => ['nullable', 'string', 'max:100'],
        ]);
        $q = $data['q'] ?? null;

        $alat = Alat::when($q, fn ($query) => $query->where('nama', 'like', "%{$q}%"))
            ->orderBy('kode')
            ->paginate(10)
            ->withQueryString();

        return view('alat.index', compact('alat', 'q'));
    }
}