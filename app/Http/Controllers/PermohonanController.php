<?php

namespace App\Http\Controllers;

use DB;
use DataTables;
use App\Pasien;
use App\Dokter;
use App\Permohonan;
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    public function index(Request $request)
    {
        $join = Permohonan::join('pasiens', 'pasiens.id', '=', 'permohonans.pasien_id')
                            ->join('dokters', 'dokters.id', '=', 'permohonans.dokter_id')
                            ->get(['permohonans.*', 'pasiens.nama as NamaPasien', 'permohonans.*', 'dokters.nama as NamaDokter']);
        if($request->ajax()) {
            return datatables()->of($join)
                ->addColumn('action', function($item) {
                    return '
                        <a class="btn btn-primary" href="' . route('permohonan.edit', $item->id) . '">
                            Ubah
                        </a>
                        <button class="btn btn-danger delete_modal" type="button" data-id="' . $item->id . '" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                        </button>
                    ';
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make();
            }  
        return view('permohonan.index');
    }

    public function create()
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        return view('permohonan.create', compact('pasien', 'dokter'));
    }

    public function store(Request $request)
    {
        $rule = [
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'noAntrian' => 'required',
            'keluhan' => 'required',
            'tglPermohonan' => 'required',
        ];
        $this->validate($request, $rule);

        // $data = $request->all();
        // dd($request->noAntrian);
        // $query = Permohonan::create($data);
        $query = new Permohonan;
        $query->pasien_id = $request->pasien_id;
        $query->dokter_id = $request->dokter_id;
        $query->noAntrian = $request->noAntrian;
        $query->keluhan = $request->keluhan;
        $query->tglPermohonan = $request->tglPermohonan;
        $query->save();
        return redirect()->route('permohonan.index')->with('success', 'Permohonan Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $pasien = Pasien::all();
        $dokter = Dokter::all();
        $data = Permohonan::findOrFail($id);
        return view('permohonan.edit', compact('data', 'pasien', 'dokter'));
    }

    public function update(Request $request, $id)
    {
        $rule = [
            'pasien_id' => 'required',
            'dokter_id' => 'required',
            'noAntrian' => 'required',
            'keluhan' => 'required',
            'tglPermohonan' => 'required',
        ];
        $this->validate($request, $rule);

        $query = Permohonan::findOrFail($id);
        $query->pasien_id = $request->pasien_id;
        $query->dokter_id = $request->dokter_id;
        $query->noAntrian = $request->noAntrian;    
        $query->keluhan = $request->keluhan;
        $query->tglPermohonan = $request->tglPermohonan;
        $query->save();
        return redirect()->route('permohonan.index')->with('success', 'Permohonan Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data = Permohonan::findOrFail($id)->delete();
        return response()->json($data);
    }
}
