<?php

namespace App\Http\Controllers;

use App\ProgramDonation;
use App\CategoryDonation;
use App\Blog;
use App\User;
use App\Transaction;
use PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = CategoryDonation::all();
        $items = ProgramDonation::with(['galleries'])->limit(2)->orderBy('created_at', 'desc')->get();
        $blogs = Blog::limit('3')->get();
        return view('pages.user.home', [
            'items' => $items,
            'category' => $category,
            'blogs' => $blogs
        ]);
    }

    public function laporanmember()
    {
        $items = User::all();
        return view('pages.user.laporan.daftar-member', [
            'items' => $items
        ]);
    }

    public function memberpdf()
    {
        $items = User::all();
        return view('pages.user.laporan.daftar-member-pdf', [
            'items' => $items
        ]);
    }

    public function memberexcel()
    {
        $items = User::all();
        return view('pages.user.laporan.daftar-member-excel', [
            'items' => $items
        ]);
    }

    // Laporan Donasi
    public function laporandonasi(Request $request)
    {
        $idprogram = $request->get('idprogram');
        $program = ProgramDonation::findOrFail($idprogram);
        $namaprogram = $program->judul;

        $items = Transaction::where(['program_donations_id' => $idprogram, 'status_transaksi' => 'SUCCESS'])->get();
        return view('pages.user.laporan.daftar-donasi', [
            'items' => $items,
            'namaprogram' => $namaprogram
        ]);
    }

    public function laporandonasigagal(Request $request)
    {
        $idprogram = $request->get('idprogram');
        $program = ProgramDonation::findOrFail($idprogram);
        $namaprogram = $program->judul;

        $items = Transaction::where(['program_donations_id' => $idprogram, 'status_transaksi' => 'EXPIRED'])->get();
        return view('pages.user.laporan.daftar-donasi-gagal', [
            'items' => $items,
            'namaprogram' => $namaprogram
        ]);
    }

    public function donasipdf(Request $request)
    {
        $idprogram = $request->get('idprogram');
        $program = ProgramDonation::findOrFail($idprogram);
        $namaprogram = $program->judul;

        $items = Transaction::where(['program_donations_id' => $idprogram, 'status_transaksi' => 'SUCCESS'])->get();
        return view('pages.user.laporan.daftar-donasi-pdf', [
            'items' => $items,
            'namaprogram' => $namaprogram
        ]);
    }

    public function donasipdfgagal(Request $request)
    {
        $idprogram = $request->get('idprogram');
        $program = ProgramDonation::findOrFail($idprogram);
        $namaprogram = $program->judul;

        $items = Transaction::where(['program_donations_id' => $idprogram, 'status_transaksi' => 'EXPIRE'])->get();
        return view('pages.user.laporan.daftar-donasi-pdf-gagal', [
            'items' => $items,
            'namaprogram' => $namaprogram
        ]);
    }

    public function donasiexcel(Request $request)
    {
        $idprogram = $request->get('idprogram');
        $program = ProgramDonation::findOrFail($idprogram);
        $namaprogram = $program->judul;

        $items = Transaction::where(['program_donations_id' => $idprogram, 'status_transaksi' => 'SUCCESS'])->get();
        return view('pages.user.laporan.daftar-donasi-excel', [
            'items' => $items,
            'namaprogram' => $namaprogram
        ]);
    }

    public function donasiexcelgagal(Request $request)
    {
        $idprogram = $request->get('idprogram');
        $program = ProgramDonation::findOrFail($idprogram);
        $namaprogram = $program->judul;

        $items = Transaction::where(['program_donations_id' => $idprogram, 'status_transaksi' => 'EXPIRE'])->get();
        return view('pages.user.laporan.daftar-donasi-excel-gagal', [
            'items' => $items,
            'namaprogram' => $namaprogram
        ]);
    }
}
