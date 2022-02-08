<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\CategoryDonation;
use App\User;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;

class UserController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $identitas = Auth::user();

        if (!$identitas) {
            return redirect()->route('home');
        }

        $email = Auth::user()->email;
        $transaction = Transaction::with('program_donation')->where('email', $email)->orderBy('created_at', 'desc')->get();
        $category = CategoryDonation::all();
        return view('pages.user.profile', [
            'identitas' => $identitas,
            'transaction' => $transaction,
            'category' => $category
        ]);
    }

    public function edit()
    {
        $identitas = Auth::user();
        // return $identitas;
        return view('pages.user.edit_profile', [
            'identitas' => $identitas
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'namalengkap' => 'required'
        ]);

        $nama = $request->namalengkap;
        $foto = Auth::user()->foto;

        $data['name'] = $nama;
        if ($request->foto) {
            $data['foto'] = $request->file('foto')->store(
                'assets/gallery/profile',
                'public'
            );
        } else {
            $data['foto'] = $foto;
        }

        $item = User::findOrFail($id);
        $item->update($data);

        Session::flash('message', 'Profile Berhasil Diedit');
        return redirect()->route('profile');
    }
}
