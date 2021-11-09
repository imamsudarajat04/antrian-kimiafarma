<?php

namespace App\Http\Controllers;
use App\Pasien;
use DataTables;
use Illuminate\Http\Request;

class PasienController extends Controller
{
    public function index(Request $request)
    {
        $query = Pasien::all();
        if($request->ajax()) {
            return datatables()->of($query)
                ->addColumn('action', function($item) {
                    $return = '
                        <a class="btn btn-success btn-block" href="' . route('pasien.show', $item->id) .'">
                            Lihat
                        </a>
                        <a class="btn btn-primary" href="' . route('pasien.edit', $item->id) . '">
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
        return view('pasien.index');
    }

    public function create()
    {
        return view('pasien.create');
    }

    public function store(Request $request)
    {
        $rule = [
            'noAntrian' => 'required|max:5',
            'nama' => 'required',
            'tempat' => 'required',
            'tglLahir' => 'required',
            'jenisKelamin' => 'required',
            'umur' => 'required',
            'alamat' => 'required'
        ];
        $this->validate($request, $rule);

        $data = $request->all();
        $query = Pasien::create($data);
        return redirect()->route('pasien.index')->with('success', 'Pasien Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $data = Pasien::findOrFail($id);
        return view('pasien.show', compact('data'));
    }

    public function edit($id)
    {
        $data = Pasien::findOrFail($id);
        return view('pasien.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $rule = [
            'nama' => 'required',
            'tempat' => 'required',
            'tglLahir' => 'required',
            'jenisKelamin' => 'required',
            'umur' => 'required',
            'alamat' => 'required'
        ];
        $this->validate($request, $rule);
        $data = $request->all();
        $item = Pasien::find($id);
        $item->update($data);

        return redirect()->route('pasien.index')->with('success', 'Data Pasien Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data = Pasien::findOrFail($id)->delete();
        return response()->json($data);
    }
}
