<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\TransactionSuccess;
use App\Http\Requests\Admin\DonationRequest;
use App\Transaction;
use App\ProgramDonation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail as FacadesMail;

use Midtrans\Config;
use Midtrans\Snap;
use PhpParser\Node\Stmt\TryCatch;

class DonasiController extends Controller
{

    public function index(Request $request, $slug)
    {
        $item = ProgramDonation::with(['galleries'])->where('slug', $slug)->firstOrFail();
        return view('pages.user.donasi', [
            'item' => $item
        ]);
    }

    public function process(DonationRequest $request, $slug)
    {

        $item = ProgramDonation::with(['galleries'])->where('slug', $slug)->firstOrFail();

        if (!$request->samarkan) {
            $samarkan = 0;
        } else {
            $samarkan = 1;
        }

        $donatur = Transaction::create([
            'program_donations_id'  => $item->id,
            'nama_lengkap'          => $request->namalengkap,
            'email'                 => $request->email,
            'jumlah_donasi'          => $request->jumlahdonasi,
            'status_transaksi'      => 'PENDING',
            'doa'                   => 'Semoga cepat selesai',
            'samarkan'              => $samarkan,
            'kategori_program'      => $item->kategori,
            'invoice'               => ""
        ]);

        // update invoice
        $tanggal = date('Ymd');
        $invoice = "ALHIKMAHMJL-"  . $tanggal . $donatur->id;
        $inv['invoice'] =  $invoice;
        $editdata = Transaction::findOrFail($donatur->id);
        $editdata->update($inv);

        // Setting Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Membuat array untuk dikirim ke midtrans
        $midtrans_params = [
            'transaction_details' => [
                'order_id'  => $invoice,
                'gross_amount'  => (int) $request->jumlahdonasi
            ],
            'customer_details' => [
                'first_name' => $request->namalengkap,
                'email' => $request->email
            ],
            'enabled_payments' => [
                "credit_card", "cimb_clicks",
                "bca_klikbca", "bca_klikpay", "bri_epay", "echannel", "permata_va",
                "bca_va", "bni_va", "bri_va", "other_va", "gopay",
                "danamon_online", "akulaku", "shopeepay"
            ],
            'vtweb' => []
        ];

        try {
            //ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

            // Redirect ke halaman midtrans
            header('Location: ' . $paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        // $datadonatur = Transaction::with(['program_donation'])->where('id', $donatur->id)->firstOrFail();
        // Kirim Email
        // Mail::to($request->email)->send(
        //     new TransactionSuccess($datadonatur)
        // );
        // return redirect()->route('donasi-sukses');
    }

    public function donasiLogin(Request $request, $slug)
    {
        $item = ProgramDonation::with(['galleries'])->where('slug', $slug)->firstOrFail();
        return view('pages.user.donasi-login', [
            'item'  => $item
        ]);
    }

    public function processlogin(Request $request, $slug)
    {
        $messages = [
            'required' => 'Kolom ini wajib diisi',
            'numeric'   => 'Hanya boleh memasukan nomor',
            'min'       => 'Minimal Donasi Rp. 10.000'
        ];

        $request->validate([
            'jumlahdonasi' => 'required|numeric|min:10000'
        ], $messages);

        // echo $request->jumlahdonasi;

        $item = ProgramDonation::with(['galleries', 'transaction'])->where('slug', $slug)->firstOrFail();

        if (!$request->samarkan) {
            $samarkan = 0;
        } else {
            $samarkan = 1;
        }


        $donatur = Transaction::create([
            'program_donations_id'  => $item->id,
            'nama_lengkap'          => Auth::user()->name,
            'email'                 => Auth::user()->email,
            'jumlah_donasi'         => $request->jumlahdonasi,
            'status_transaksi'      => 'PENDING',
            'doa'                   => 'Doa untuk kalian semua',
            'samarkan'              => $samarkan,
            'kategori_program'      => $item->kategori,
            'invoice'               => ""
        ]);

        // update invoice
        $tanggal = date('Ymd');
        $invoice = "ALHIKMAHMJL-"  . $tanggal . $donatur->id;
        $inv['invoice'] =  $invoice;
        $editdata = Transaction::findOrFail($donatur->id);
        $editdata->update($inv);

        // Setting Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Membuat array untuk dikirim ke midtrans
        $midtrans_params = [
            'transaction_details' => [
                'order_id'  => $invoice,
                'gross_amount'  => (int) $request->jumlahdonasi
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email
            ],
            'enabled_payments' => [
                "credit_card", "cimb_clicks",
                "bca_klikbca", "bca_klikpay", "bri_epay", "echannel", "permata_va",
                "bca_va", "bni_va", "bri_va", "other_va", "gopay",
                "danamon_online", "akulaku", "shopeepay"
            ],
            'vtweb' => []
        ];

        try {
            //ambil halaman payment midtrans
            $paymentUrl = Snap::createTransaction($midtrans_params)->redirect_url;

            // Redirect ke halaman midtrans
            header('Location: ' . $paymentUrl);
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        // $datadonatur = Transaction::with(['program_donation'])->where('id', $donatur->id)->firstOrFail();
        // // Kirim Email
        // $namaemail = Auth::user()->email;
        // Mail::to($namaemail)->send(
        //     new TransactionSuccess($datadonatur)
        // );
        // return redirect()->route('donasi-sukses');
    }

    public function success(Request $request)
    {

        return view('pages.user.sukses');
    }
}
