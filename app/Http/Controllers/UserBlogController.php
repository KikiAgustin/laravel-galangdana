<?php

namespace App\Http\Controllers;

use App\CategoryDonation;
use App\Blog;
use App\CategoryBlog;
use App\CommentBlog;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;

class UserBlogController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = CategoryDonation::all();
        $items = Blog::with(['category'])->get();
        $populer = Blog::with(['category'])->orderBy('dilihat', 'desc')->limit('2')->get();
        $catblog = CategoryBlog::limit('3')->get();
        return view('pages.user.daftar-blog', [
            'items' => $items,
            'category' => $category,
            'populer' => $populer,
            'catblog' => $catblog
        ]);
    }


    public function comment(Request $request, $slug)
    {

        $request->validate([
            'komentar' => 'required'
        ]);
        $item = Blog::with(['category'])->where('slug', $slug)->firstOrFail();
        $user = Auth::user()->id;
        $data = ([
            'id_blogs' => $item->id,
            'user_id' => $user,
            'komentar' => $request->komentar
        ]);

        CommentBlog::create($data);
        Session::flash('message', 'komentar Berhasil Tambahkan');
        return redirect(route('detail-blog', $item->slug));
    }
}
