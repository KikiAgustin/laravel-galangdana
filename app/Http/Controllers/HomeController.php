<?php

namespace App\Http\Controllers;

use App\ProgramDonation;
use App\CategoryDonation;
use App\Blog;
use Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = CategoryDonation::all();
        $items = ProgramDonation::with(['blog'])->limit(2)->orderBy('created_at', 'desc')->get();
        $blogs = Blog::limit('3')->get();
        return view('pages.user.home', [
            'items' => $items,
            'category' => $category,
            'blogs' => $blogs
        ]);
    }

    public function program(Request $request)
    {
        $cek = $request->get('idkategori');
        $cekdata = ProgramDonation::where('kategori', $cek)->count();
        $category = CategoryDonation::all();

        if ($cekdata == 0) {
            $items = ProgramDonation::with(['galleries'])->get();
            Session::flash('message', 'Untuk Kategori ini belum tersedia, Silahkan pilih program yang tersedia dibawah ini ');
            return view('pages.user.program', [
                'items' => $items,
                'category' => $category
            ]);
        } else {
            $items = ProgramDonation::with(['galleries'])->where('kategori', $cek)->get();
            return view('pages.user.program', [
                'items' => $items,
                'category' => $category
            ]);
        }
    }
}
