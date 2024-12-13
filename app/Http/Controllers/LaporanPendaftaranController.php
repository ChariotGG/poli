<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanPendaftaranController extends Controller
{
    public function index(Request $request)
    {
        $pendaftaran = \App\Models\Pendaftaran::query();
        $data['listPoli'] = \App\Models\Poliklinik::orderBy('nama_poliklinik', 'asc')->get();
        if (count($request->query) > 0) {
            if ($request->tanggal_mulai == null) {
                $tanggal_mulai = date('Y-m-d', strtotime($pendaftaran->min('created_at')));
            } else {
                $tanggal_mulai = $request->filled('tanggal_mulai') ? $request->tanggal_mulai : date('Y-m-d');
            }
            if ($request->tanggal_akhir == null) {
                $tanggal_akhir = date('Y-m-d', strtotime($pendaftaran->max('created_at')));
            } else {
                $tanggal_akhir = $request->filled('tanggal_akhir') ? $request->tanggal_akhir : date('Y-m-d');
            }
        } else {
            $tanggal_mulai = $request->filled('tanggal_mulai') ? $request->tanggal_mulai : date('Y-m-d');
            $tanggal_akhir = $request->filled('tanggal_akhir') ? $request->tanggal_akhir : date('Y-m-d');
        }

        $pendaftaran->whereDate('created_at', '>=', $tanggal_mulai);
        $pendaftaran->whereDate('created_at', '<=', $tanggal_akhir);

        if ($request->filled('jenis_kelamin') && $request->jenis_kelamin != 'semua') {
            $pendaftaran->where('jenis_kelamin', $request->jenis_kelamin);
        }

        $per_page = $request->get('per_page', 10);
        if ($per_page != 'all') {
            $data['models'] = $pendaftaran->latest()->paginate($per_page);
            $data['models']->appends($request->except('page')); // Append all request parameters except 'page'
        } else {
            $data['models'] = $pendaftaran->latest()->get();
        }
        if ($request->ajax()) {
            if (!empty($data)) {
                $tableHtml = view('partials.tableLaporanPendaftaran', $data)->render();
                return response()->json(['html' => $tableHtml]);
            } else {
                return response()->json(['html' => 'No data available']);
            }
        }
        return view('laporan.pendaftaran.index', $data);
    }
}
