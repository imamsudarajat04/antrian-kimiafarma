<?php

namespace App\Http\Controllers;

use App\User;
use App\Obat;
use App\Pasien;
use App\Antrian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');

        $pasiens = Pasien::all()->count();
        $obat = Obat::all()->count();
        $antrians = Antrian::where('status', 'Ok')->whereDate('tglAntrian', '=', $year.'-'.$month.'-'.$day)->orderBy('tglAntrian', 'ASC')->count();
        $cekrow = Antrian::whereDate('tglAntrian', '=', $year.'-'.$month.'-'.$day)->count();
        return view('dashboard.index', compact('pasiens', 'obat','antrians', 'cekrow'));
    }
}
