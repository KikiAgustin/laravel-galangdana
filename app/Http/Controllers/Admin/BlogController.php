<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProgramDonationsRequest;
use App\Blog;
use App\CategoryBlog;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Blog::with(['category'])->get()->all();
        // return $items;

        return view('pages.admin.blog.index', [
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
        $items = CategoryBlog::all();
        return view('pages.admin.blog.create', [
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
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kategori' => 'required',
            'lengkap' => 'required',
            'gambar' => 'required|image'
        ]);

        $singkat = strip_tags($request->lengkap);
        $desingkat = substr($singkat, 0, 100);
        $dilihat = 0;

        $data = ([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori' => $request->kategori,
            'lengkap' => $request->lengkap,
            'penulis' => $request->penulis,
            'singkat' => $desingkat,
            'dilihat' => $dilihat
        ]);
        if ($request->gambar) {
            $data['gambar'] = $request->file('gambar')->store(
                'assets/gallery/blog',
                'public'
            );
        } else {
            $data['gambar'] = "";
        }

        Blog::create($data);

        Session::flash('message', 'Blog Berhasil Ditambah');
        return redirect()->route('blog.index');
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
        $item = Blog::with('category')->findOrFail($id);
        // return $item;
        $items = CategoryBlog::all();
        return view('pages.admin.blog.edit', [
            'item' => $item,
            'items' => $items,
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
            'kategori' => 'required',
            'lengkap' => 'required'
        ]);

        $item = Blog::findOrFail($id);

        $singkat = strip_tags($request->lengkap);
        $desingkat = substr($singkat, 0, 100);
        $data = ([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori' => $request->kategori,
            'lengkap' => $request->lengkap,
            'penulis' => $request->penulis,
            'singkat' => $desingkat

        ]);
        if ($request->gambar) {
            $data['gambar'] = $request->file('gambar')->store(
                'assets/gallery/blog',
                'public'
            );
        } else {
            $data['gambar'] = "$item->gambar";
        }

        $item->update($data);

        Session::flash('message', 'Blog Berhasil Diedit');
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Blog::FindOrFail($id);
        $item->delete();

        Session::flash('message', 'Blog Berhasil Dihapus');
        return redirect()->route('blog.index');
    }
}
