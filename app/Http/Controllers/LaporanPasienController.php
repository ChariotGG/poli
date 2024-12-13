<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPasienController extends Controller
{
    public function index(Request $request)
    {
        $pasien = \App\Models\Pasien::query();
        if (count($request->query) > 0) {
            if ($request->tanggal_mulai == null) {
                $tanggal_mulai = date('Y-m-d', strtotime($pasien->min('created_at')));
            } else {
                $tanggal_mulai = $request->filled('tanggal_mulai') ? $request->tanggal_mulai : date('Y-m-d');
            }
            if ($request->tanggal_akhir == null) {
                $tanggal_akhir = date('Y-m-d', strtotime($pasien->max('created_at')));
            } else {
                $tanggal_akhir = $request->filled('tanggal_akhir') ? $request->tanggal_akhir : date('Y-m-d');
            }
        } else {
            $tanggal_mulai = $request->filled('tanggal_mulai') ? $request->tanggal_mulai : date('Y-m-d');
            $tanggal_akhir = $request->filled('tanggal_akhir') ? $request->tanggal_akhir : date('Y-m-d');
        }

        $pasien->whereDate('created_at', '>=', $tanggal_mulai);
        $pasien->whereDate('created_at', '<=', $tanggal_akhir);

        if ($request->filled('jenis_kelamin') && $request->jenis_kelamin != 'semua') {
            $pasien->where('jenis_kelamin', $request->jenis_kelamin);
        }

        $per_page = $request->get('per_page', 10);
        if ($per_page != 'all') {
            $data['models'] = $pasien->latest()->paginate($per_page);
            $data['models']->appends($request->except('page')); // Append all request parameters except 'page'
        } else {
            $data['models'] = $pasien->latest()->get();
        }
        if ($request->ajax()) {
            if (!empty($data)) {
                $tableHtml = view('partials.tableLaporanPasien', $data)->render();
                return response()->json(['html' => $tableHtml]);
            } else {
                return response()->json(['html' => 'No data available']);
            }
        }
        return view('laporan.pasien.index', $data);
    }
}
