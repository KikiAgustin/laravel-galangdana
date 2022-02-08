<?php

namespace App\Http\Controllers;

use App\Blog;
use App\CategoryDonation;
use App\CategoryBlog;
use App\CommentBlog;
use Illuminate\Http\Request;

class UserBlogDetailController extends Controller
{
    public function index(Request $request, $slug)
    {
        $item = Blog::with(['category'])->where('slug', $slug)->firstOrFail();
        $populer = Blog::with(['category'])->orderBy('dilihat', 'desc')->limit('2')->get();
        $dilihat = $item->dilihat;
        $tambahview = $dilihat + 1;

        $data['dilihat'] = $tambahview;
        $item->update($data);

        $comment = CommentBlog::with(['data_user'])->where('id_blogs', $item->id)->get();
        $catblog = CategoryBlog::all();
        $category = CategoryDonation::all();
        return view('pages.user.blog-detail', [
            'item' => $item,
            'category' => $category,
            'populer' => $populer,
            'catblog' => $catblog,
            'comment' => $comment
        ]);
    }
}
