<?php

namespace App\Http\Controllers;

use App\Obat;
use DataTables;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    public function index(Request $request)
    {
        $query = Obat::all();
        if($request->ajax()) {
            return datatables()->of($query)
                ->addColumn('action', function($item) {
                    return '
                        <a class="btn btn-primary" href="' . route('obat.edit', $item->id) . '">
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
        return view('obat.index');
    }

    public function create()
    {
        return view('obat.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'kodeProduksi' => 'required',
            'namaObat' => 'required',
            'jenisObat' => 'required',
            'satuan' => 'required',
            'stok' => 'required',
            'tglExpired' => 'required'
        ];
        $this->validate($request, $rule);

        $data = $request->all();
        $query = Obat::create($data);
        return redirect()->route('obat.index')->with('success', "Obat Berhasil Ditambahkan");
    }

    public function edit($id)
    {
        $data = Obat::findOrFail($id);
        return view('obat.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $rule = [
            'namaObat' => 'required',
            'jenisObat' => 'required',
            'satuan' => 'required',
            'stok' => 'required|numeric',
            'tglExpired' => 'required'
        ];
        $this->validate($request, $rule);

        $data = $request->all();
        $item = Obat::find($id);
        $item->update($data);

        return redirect()->route('obat.index')->with('success', 'Data Obat Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data = Obat::findOrFail($id)->delete();
        return response()->json($data);
    }
}
