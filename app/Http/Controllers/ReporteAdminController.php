<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class ReporteAdminController extends Controller
{
    public function exportarExcel()
    {

        $datos = DB::table('users')->get();

        $filename = "reporte_administrador_" . date('Ymd_His') . ".xls";
        
        header("Content-Type: application/vnd.ms-excel; charset=utf-8");
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Pragma: no-cache");
        header("Expires: 0");

        return view('reportes.excel', compact('datos'));
    }
}
