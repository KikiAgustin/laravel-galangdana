<?php

namespace App\Http\Controllers;

use App\Profile;
use App\CategoryDonation;
use Illuminate\Http\Request;

class YayasanController extends Controller
{
    public function index(Request $request, $id)
    {
        $category = CategoryDonation::all();
        $item = Profile::findOrFail($id);
        return view('pages.user.yayasan-tujuan', [
            'item' => $item,
            'category' => $category
        ]);
    }

    public function tentang(Request $request, $id)
    {
        $category = CategoryDonation::all();
        $item = Profile::findOrFail($id);
        return view('pages.user.yayasan-tentang', [
            'item' => $item,
            'category' => $category
        ]);
    }

    public function struktur()
    {
        $category = CategoryDonation::all();
        return view('pages.user.struktur-organisasi', [
            'category' => $category
        ]);
    }
}
