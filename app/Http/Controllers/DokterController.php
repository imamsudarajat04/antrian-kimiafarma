<?php

namespace App\Http\Controllers;

use App\Dokter;
use DataTables;
use Illuminate\Http\Request;

class DokterController extends Controller
{
    public function index(Request $request)
    {
        $query = Dokter::all();
        if($request->ajax()) {
            return datatables()->of($query)
                ->addColumn('action', function($item) {
                    $return = '
                        <a class="btn btn-success btn-block" href="' . route('dokter.show', $item->id) .'">
                            Lihat
                        </a>
                        <a class="btn btn-primary" href="' . route('dokter.edit', $item->id) . '">
                            Ubah
                        </a>
                        <button class="btn btn-danger delete_modal" type="button" data-id="' . $item->id . '" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                        </button>
                    ';
                    return $return;
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make();
        }
        return view('dokter.index');
    }

    public function create(Request $request)
    {
        return view('dokter.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'nip' => 'required|unique:dokters|max:18',
            'nama' => 'required',
            'tempat' => 'required',
            'tglLahir' => 'required',
            'jenisKelamin' => 'required',
            'bidangKeahlian' => 'required'
        ];
        $this->validate($request, $rule);

        $data = $request->all();
        $query = Dokter::create($data);
        return redirect()->route('dokter.index')->with('success', "Dokter Berhasil Ditambahkan");
    }

    public function show($id)
    {
        $data = Dokter::findOrFail($id);
        return view('dokter.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Dokter::findOrFail($id);
        return view('dokter.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $rule = [
            'nama' => 'required',
            'tempat' => 'required',
            'tglLahir' => 'required',
            'jenisKelamin' => 'required',
            'bidangKeahlian' => 'required'
        ];
        $this->validate($request, $rule);

        $data = $request->all();
        $item = Dokter::find($id);
        $item->update($data);

        return redirect()->route('dokter.index')->with('success', 'Data Dokter Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data = Dokter::findOrFail($id)->delete();
        return response()->json($data);
    }
}
