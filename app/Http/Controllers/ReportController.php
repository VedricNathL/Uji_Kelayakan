<?php
namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function getReportsByProvince($province)
    {
        // Mengambil laporan berdasarkan provinsi yang dipilih
        $reports = Report::where('province', 'like', '%' . $province . '%')->get();

        if ($reports->isEmpty()) {
            return response()->json([], 404);  // Jika tidak ada laporan, kembalikan 404
        }

        return response()->json($reports);  // Mengembalikan laporan dalam format JSON
    }
}

