<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProgramDonationsRequest;
use App\ProgramDonation;
use App\CategoryDonation;
use App\Distribution;
use App\ReportTransaction;
use Illuminate\Bus\Dispatcher;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ReportTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ProgramDonation::with(['category', 'data_distribution'])->get();
        return view('pages.admin.report.index', [
            'items' => $items,
            'cekroles' => Auth::user()->roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $idprogram = $request->get('idprogram');
        return view('pages.admin.report.create', [
            'idprogram' => $idprogram,
            'cekroles' => Auth::user()->roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal_transaksi' => 'required',
            'nama_transaksi' => 'required',
            'jumlah' => 'required'
        ]);

        $data = [
            'program_id' => $request->program_id,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'nama_transaksi' => $request->nama_transaksi,
            'jumlah' => $request->jumlah
        ];


        ReportTransaction::create($data);
        Session::flash('message', 'Transaksi Berhasil Ditambah');
        return redirect()->route('report-transaction.show', $request->program_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = ReportTransaction::where('program_id', $id)->get();
        $idprogram = $id;
        return view('pages.admin.report.data', [
            'items' => $items,
            'idprogram' => $idprogram,
            'cekroles' => Auth::user()->roles
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ReportTransaction::findOrFail($id);

        return view('pages.admin.report.edit', [
            'item' => $item,
            'cekroles' => Auth::user()->roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggal_transaksi' => 'required',
            'nama_transaksi' => 'required',
            'jumlah' => 'required'
        ]);

        $data = [
            'program_id' => $request->idprogram,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'nama_transaksi' => $request->nama_transaksi,
            'jumlah' => $request->jumlah
        ];

        $item = ReportTransaction::FindOrFail($id);
        $item->update($data);

        Session::flash('message', 'Transaksi Berhasil Diedit');
        return redirect()->route('report-transaction.show', $request->idprogram);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ReportTransaction::FindOrFail($id);
        $item->delete();

        Session::flash('message', 'Transaksi Berhasil Dihapus');
        return redirect()->route('report-transaction.show', $item->program_id);
    }
}
