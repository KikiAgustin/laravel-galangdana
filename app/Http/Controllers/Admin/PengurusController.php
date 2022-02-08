<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProgramDonationsRequest;
use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PengurusController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::where('roles', '!=', 'USER')->get();
        // return $items;
        return view('pages.admin.pengurus.index', [
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
        return view('pages.admin.pengurus.create', [
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $data = ([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'roles' => $request['roles']
        ]);

        if ($request->foto) {
            $data['foto'] = $request->file('foto')->store(
                'assets/gallery/profile',
                'public'
            );
        } else {
            $data['foto'] = "";
        }


        User::create($data);

        Session::flash('message', 'Pengurus Berhasil Ditambah');
        return redirect()->route('pengurus-yayasan.index');
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
        $item = User::findOrFail($id);
        // return $item;
        return view('pages.admin.pengurus.edit', [
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
            'name' => ['required', 'string', 'max:255']
        ]);

        $item = User::FindOrFail($id);

        $data = ([
            'name' => $request['name'],
            'email' => $request['email'],
            'roles' => $request['roles']
        ]);

        if ($request->foto) {
            $data['foto'] = $request->file('foto')->store(
                'assets/gallery/profile',
                'public'
            );
        } else {
            $data['foto'] = $item->foto;
        }


        $item->update($data);

        Session::flash('message', 'Profile Berhasil Diedit');
        return redirect()->route('pengurus-yayasan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = User::FindOrFail($id);
        $item->delete();

        Session::flash('message', 'Profile Berhasil Dihapus');
        return redirect()->route('pengurus-yayasan.index');
    }
}
