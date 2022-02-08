<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GalleryRequest;
use App\Gallery;
use App\ProgramDonation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Session;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Gallery::with(['program_donation'])->get();

        return view('pages.admin.gallery.index', [
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
        $program_donations = ProgramDonation::all();
        return view('pages.admin.gallery.create', [
            'program_donations' => $program_donations,
            'cekroles' => Auth::user()->roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );

        Gallery::create($data);

        Session::flash('message', 'Gambar berhasil dihapus');
        return redirect()->route('gallery.index');
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
        $item = Gallery::with(['program_donation'])->findOrFail($id);
        $program_donations = ProgramDonation::all();
        // return $item;

        return view('pages.admin.gallery.edit', [
            'item' => $item,
            'program_donations' => $program_donations,
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
    public function update(GalleryRequest $request, $id)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery',
            'public'
        );

        $item = Gallery::FindOrFail($id);
        $item->update($data);

        Session::flash('message', 'Gambar berhasil diedit');
        return redirect()->route('gallery.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Gallery::FindOrFail($id);
        $item->delete();

        Session::flash('message', 'Gambar berhail dihapus');
        return redirect()->route('gallery.index');
    }
}
