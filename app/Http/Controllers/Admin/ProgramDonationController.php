<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProgramDonationsRequest;
use App\ProgramDonation;
use App\CategoryDonation;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ProgramDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ProgramDonation::with(['category'])->get();
        // return $items;

        return view('pages.admin.program-donation.index', [
            'items' => $items,
            'cekroles' => Auth::user()->roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pengirim = Auth::user()->name;
        $items = CategoryDonation::all();
        return view('pages.admin.program-donation.create', [
            'items' => $items,
            'pengirim'  => $pengirim,
            'cekroles' => Auth::user()->roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProgramDonationsRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['terkumpul'] = 0;

        ProgramDonation::create($data);

        Session::flash('message', 'Program Berhasil Ditambah');
        return redirect()->route('program-donation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = ProgramDonation::with(['category'])->findOrFail($id);
        $categoriDonation = CategoryDonation::all();
        // return $categoriDonation;

        return view('pages.admin.program-donation.edit', [
            'item' => $item,
            'category_donations' => $categoriDonation,
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
    public function update(ProgramDonationsRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);

        $item = ProgramDonation::FindOrFail($id);
        $item->update($data);

        Session::flash('message', 'Program Berhasil Diedit');
        return redirect()->route('program-donation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProgramDonation::FindOrFail($id);
        $item->delete();

        Session::flash('message', 'Program Berhasil Dihapus');
        return redirect()->route('program-donation.index');
    }
}
