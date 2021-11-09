<?php

namespace App\Http\Controllers;

use App\User;
use DataTables;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $query = User::all();
        if($request->ajax()) {
            return datatables()->of($query)
                ->addColumn('action', function($item) {
                    $return = '
                    <a class="btn btn-primary" href="' . route('user.edit', $item->id) . '">
                        Ubah
                    </a>
                    <button class="btn btn-danger delete_modal" type="button" data-id="' . $item->id . '" data-toggle="modal" data-target="#exampleModal">
                        Hapus
                    </button>
                    ';
                    return $return;
                })
                ->editColumn('level', function($item) {
                    return '
                        <label class="badge badge-primary mr-2">' . $item->level . '</label>
                    ';
                })
                ->editColumn('status', function($item) {
                    $return  = '';

                    if($item->status == 'Aktif')
                    {
                        $return .= '<label class="badge badge-success mr-2">' . $item->status . '</label>';
                    }
                    else
                    {
                        $return .= '<label class="badge badge-danger mr-2">' . $item->status . '</label>';
                    }

                    return $return;
                })
                ->rawColumns(['action', 'level', 'status'])
                ->addIndexColumn()
                ->make();
            // return datatables()->of($query)->make(true);
        }
        return view('users.index');
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($data['password']);
        
        $user = User::create($data);
        return redirect()->route('user.index')->with('success', 'User Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $data = User::findOrFail($id);
        return view('users.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        if(!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            $data = Arr::except($data, array('password'));
        }

        $item = User::find($id);
        $item->update($data);

        return redirect()->route('user.index')->with('success', 'Data User Berhasil Diubah');
    }

    public function destroy($id)
    {
        $data = User::findOrFail($id)->delete();

        return response()->json($data);
    }
}
