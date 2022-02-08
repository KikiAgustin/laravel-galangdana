<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProgramDonationsRequest;
use App\ProgramDonation;
use App\CategoryDonation;
use App\Distribution;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;

class CategoryDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = CategoryDonation::all();

        return view('pages.admin.category-donation.index', [
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
        return view('pages.admin.category-donation.create', [
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
            'namakategori' => 'required'
        ]);

        $data['nama_kategori'] = $request->namakategori;

        CategoryDonation::create($data);

        Session::flash('message', 'Kategori Program Berhasil Ditambah');
        return redirect()->route('category-donation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Distribution::findOrFail($id);
        return View('pages.admin.penyaluran.detail', [
            'item' => $item,
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
        $item = CategoryDonation::findOrFail($id);

        return view('pages.admin.category-donation.edit', [
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
            'namakategori' => 'required'
        ]);

        $data['nama_kategori'] = $request->namakategori;

        $item = CategoryDonation::FindOrFail($id);
        $item->update($data);

        Session::flash('message', 'Kategori Program Berhasil Diedit');
        return redirect()->route('category-donation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CategoryDonation::FindOrFail($id);
        $item->delete();

        Session::flash('message', 'Kategori Program Berhasil Dihapus');
        return redirect()->route('category-donation.index');
    }
}
