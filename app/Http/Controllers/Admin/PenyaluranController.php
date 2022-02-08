<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProgramDonationsRequest;
use App\ProgramDonation;
use App\CategoryDonation;
use App\Distribution;
use Illuminate\Bus\Dispatcher;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PenyaluranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ProgramDonation::with(['category', 'data_distribution'])->get();
        // return $items;
        return view('pages.admin.penyaluran.index', [
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
        return view('pages.admin.penyaluran.create', [
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
            'judul' => 'required',
            'tanggal_penyaluran' => 'required',
            'detail' => 'required'
        ]);

        $data = [
            'judul' => $request->judul,
            'penyaluran' => $request->detail,
            'program_id' => $request->program_id,
            'tanggal_penyaluran' => $request->tanggal_penyaluran
        ];

        if ($request->gambar) {
            $data['gambar'] = $request->file('gambar')->store(
                'assets/gallery/penyaluran',
                'public'
            );
        } else {
            $data['gambar'] = "";
        }

        Distribution::create($data);
        Session::flash('message', 'Penyaluran Berhasil Ditambah');
        return redirect()->route('distribution.show', $request->program_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $items = Distribution::where('program_id', $id)->get();
        $idprogram = $id;
        return view('pages.admin.penyaluran.data', [
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
        $item = Distribution::findOrFail($id);

        return view('pages.admin.penyaluran.edit', [
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
            'judul' => 'required',
            'tanggal_penyaluran' => 'required',
            'detail' => 'required'
        ]);

        $item = Distribution::FindOrFail($id);

        $data = [
            'judul' => $request->judul,
            'penyaluran' => $request->detail,
            'tanggal_penyaluran' => $request->tanggal_penyaluran
        ];

        if ($request->gambar) {
            $data['gambar'] = $request->file('gambar')->store(
                'assets/gallery/penyaluran',
                'public'
            );
        } else {
            $data['gambar'] = $item->gambar;
        }

        $item->update($data);

        Session::flash('message', 'Penyaluran Berhasil Diedit');
        return redirect()->route('distribution.show', $request->idprogram);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Distribution::FindOrFail($id);
        $item->delete();

        Session::flash('message', 'Program Berhasil Dihapus');
        return redirect()->route('distribution.show', $item->program_id);
    }
}
