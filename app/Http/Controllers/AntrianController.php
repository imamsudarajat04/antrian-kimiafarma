<?php

namespace App\Http\Controllers;
use DataTables;
use App\Antrian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AntrianController extends Controller
{
    public function index(Request $request)
    {   
        $query = Antrian::all();
        if($request->ajax()) {
            return DataTables()->of($query)
                ->addColumn('action', function($item) {
                    if($item->status == 'Waiting')
                    {
                        $return = '
                        <form action="' . route('antrian.update', $item->id) . '" method="POST">
                            ' . method_field('PUT') . csrf_field() . '
                            <input type="hidden" name="status" value="Ok">
                            <button class="btn btn-success col-12" type="submit">
                                Panggil
                            </button>
                        </form>
                        <button class="btn btn-danger col-12 mt-2 delete_modal" type="button" data-id="' . $item->id . '" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                        </button>
                        ';
                        return $return;
                    }
                    else
                    {
                        $return = '
                        <button class="btn btn-success" type="submit" disabled>
                            Ok
                        </button>
                        <button class="btn btn-danger mt-6 delete_modal" type="button" data-id="' . $item->id . '" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                        </button>
                        ';
                        return $return;
                    }
                    
                })
                ->editColumn('tglAntrian', function($item) {
                    return '
                        ' . Carbon::parse($item->tglAntrian)->format('d M Y, H:i') . '
                    ';
                })
                ->editColumn('status', function($item) {
                    $return  = '';

                    if($item->status == 'Ok')
                    {
                        $return .= '<h5><label class="badge badge-success mr-2">' . $item->status . '</label></h5>';
                    }
                    else
                    {
                        $return .= '<h5><label class="badge badge-danger mr-2">' . $item->status . '</label></h5>';
                    }

                    return $return;
                })
                ->rawColumns(['action','tglAntrian','status'])
                ->addIndexColumn()
                ->make();
        }
        return view('antrian.index');
    }

    public function update(Request $request, $id)
    {
        $item = Antrian::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('antrian.index')->with('success', 'Status Antrian Berhasil Di Ubah');
    }

    public function destroy($id)
    {
        $data = Antrian::findOrFail($id)->delete();
        return response()->json($data);
    }

    public function antrian()
    {
        return view('antrian');
    }

    public function antrianbaru($nama)
    {
        $where = Antrian::where('kode', $nama)
                    ->whereDate('tglAntrian', date('Y-m-d'))
                    ->orderBy('tglAntrian', 'desc')
                    ->first();
                   
        if(!empty($where)) {
            $nomor = $where->noAntrian+1;
        }else{
            $nomor = 1;
        }

        $antrian = new Antrian();
        $antrian->kode = $nama;
        $antrian->noAntrian = $nomor;
        $antrian->tglAntrian = date('Y-m-d H:i:s');
        $antrian->status = 'Waiting';
        $antrian->save();

    //    return redirect()->route('halaman-antrian.antrian');
    }

    
}
