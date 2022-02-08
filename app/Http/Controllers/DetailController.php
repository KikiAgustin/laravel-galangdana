<?php

namespace App\Http\Controllers;

use App\ProgramDonation;
use App\Transaction;
use App\CategoryDonation;
use App\Distribution;
use App\ReportTransaction;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = ProgramDonation::with(['galleries'])->where('slug', $slug)->firstOrFail();
        $category = CategoryDonation::all();
        $distribution = Distribution::where('program_id', $item->id)->get();
        $transaction = ReportTransaction::where(['program_id' => $item->id])->get();
        $donatur = Transaction::with(['program_donation'])->where(['program_donations_id' => $item->id, 'status_transaksi' => 'SUCCESS'])->orderBy('created_at', 'desc')->get();
        $jumlahdonatur = Transaction::where(['program_donations_id' => $item->id, 'status_transaksi' => 'SUCCESS'])->count();
        $jumlahtransaksi = ReportTransaction::where(['program_id' => $item->id])->sum('jumlah');
        return view('pages.user.detail', [
            'item' => $item,
            'donatur' => $donatur,
            'category' => $category,
            'distribution' => $distribution,
            'transaction' => $transaction,
            'jumlahdonatur' => $jumlahdonatur,
            'jumlahtransaksi' => $jumlahtransaksi
        ]);
    }
}
