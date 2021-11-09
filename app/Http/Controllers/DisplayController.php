<?php

namespace App\Http\Controllers;

use App\Antrian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index()
    {
        // date_default_timezone_set('Asia/Jakarta');
        // echo $timestamp =date('H:i:s');

        $timezone = new \DateTimeZone('Asia/Jakarta');
        $tgl = new \DateTime();
        $tgl->setTimeZone($timezone);

        $hari = date ("D");
 
        switch($hari){
            case 'Sun':
                $hari_ini = "Minggu";
            break;
     
            case 'Mon':			
                $hari_ini = "Senin";
            break;
     
            case 'Tue':
                $hari_ini = "Selasa";
            break;
     
            case 'Wed':
                $hari_ini = "Rabu";
            break;
     
            case 'Thu':
                $hari_ini = "Kamis";
            break;
     
            case 'Fri':
                $hari_ini = "Jumat";
            break;
     
            case 'Sat':
                $hari_ini = "Sabtu";
            break;
            
            default:
                $hari_ini = "Tidak di ketahui";		
            break;
        }
        
        // $antrian = Antrian::where('status', '=', 'Waiting')->where('hari', '=', $hari_ini)->first();
        $day = Carbon::now()->format('d');
        $month = Carbon::now()->format('m');
        $year = Carbon::now()->format('Y');
        
        $antrians = Antrian::where('status', 'Ok')->whereDate('tglAntrian', '=', $year.'-'.$month.'-'.$day)->orderBy('tglAntrian', 'ASC')->count();
        $cekrow = Antrian::whereDate('tglAntrian', '=', $year.'-'.$month.'-'.$day)->count();

        return view('display', compact('tgl', 'hari_ini', 'cekrow', 'antrians'));

        
    }
}
