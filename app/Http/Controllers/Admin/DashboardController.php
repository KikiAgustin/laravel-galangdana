<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\ProgramDonation;
use App\CategoryDonation;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();
        $tahun = $now->year;

        for ($bulan = 0; $bulan < 12; $bulan++) {
            $month = Carbon::now()->addMonth($bulan)->format('m');
            $jumlahnya = DB::table('transactions')->where(['status_transaksi' => 'SUCCESS'])->whereMonth('created_at', $month)->whereYear('created_at', $tahun)->sum('jumlah_donasi');
            $data[] = (int) $jumlahnya;
        }

        // $cekdata = DB::table('transactions')->where('status_transaksi', 'SUCCESS')->whereMonth('created_at', "01")->sum('jumlah_donasi');
        // return $cekdata;
        // $jumlahnya = DB::table('transactions')->whereMonth('created_at', '12')->get();

        // Kategori Donasi
        $kategori = CategoryDonation::all();

        foreach ($kategori as $kat) {
            $jmlkategori = Transaction::where(['kategori_program' => $kat->id, 'status_transaksi' => 'SUCCESS'])->whereYear('created_at', $tahun)->count();
            $jumlahkat[] = $jmlkategori;
            $namakategori[] = $kat->nama_kategori;
        }

        return view('pages.admin.dashboard', [
            'cekroles' => Auth::user()->roles,
            'program_donation' => ProgramDonation::count(),
            'transaction' => Transaction::count(),
            'transaction_success' => Transaction::where('status_transaksi', 'SUCCESS')->count(),
            'transaction_pending' => Transaction::where('status_transaksi', '<>', 'SUCCESS')->count(),
            'kemanusiaan'   => Transaction::where('kategori_program', '1')->count(),
            'pembangunan'   => Transaction::where('kategori_program', '2')->count(),
            'operasional'   => Transaction::where('kategori_program', '3')->count(),
            'jumlahdonasi'    => $data,
            'kategori'      => $namakategori,
            'jmlkategori'   => $jumlahkat
        ]);
    }
}
