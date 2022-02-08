<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TransactionSuccess;
use App\Transaction;
use App\ProgramDonation;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\Notification;

class MidtransController extends Controller
{
    public function notificationHandler(Request $request)
    {
        // Setting Midtrans
        Config::$serverKey = config('midtrans.serverKey');
        Config::$isProduction = config('midtrans.isProduction');
        Config::$isSanitized = config('midtrans.isSanitized');
        Config::$is3ds = config('midtrans.is3ds');

        // Buat Notifikasi dari midtrans
        $notification = new Notification();

        // Assign Variabel
        $status = $notification->transaction_status;
        $type = $notification->payment_type;
        $fraud = $notification->fraud_status;
        $order_id = $notification->order_id;
        $jumlahdonasi = $notification->gross_amount;

        // Cari Transaksi
        $transaction = Transaction::where('invoice', $order_id)->firstOrFail();
        $item = ProgramDonation::where('id', $transaction->program_donations_id)->firstOrFail();


        // Handle notification status midtrans
        if ($status == 'capture') {
            if ($type == 'credit_card') {
                if ($fraud == 'challenge') {
                    $transaction->status_transaksi = 'CHALLENGE';
                } else {
                    $transaction->status_transaksi = 'SUCCESS';
                    $terkumpul = $item['terkumpul'] + $jumlahdonasi;
                    $data['terkumpul'] = $terkumpul;
                    $item->update($data);
                }
            }
        } else if ($status == 'settlement') {
            $transaction->status_transaksi = 'SUCCESS';
            $terkumpul = $item['terkumpul'] + $jumlahdonasi;
            $data['terkumpul'] = $terkumpul;
            $item->update($data);
        } else if ($status == 'pending') {
            $transaction->status_transaksi = 'PENDING';
        } else if ($status == 'deny') {
            $transaction->status_transaksi = 'FAILED';
        } else if ($status == 'expire') {
            $transaction->status_transaksi = 'EXPIRED';
        } else if ($status == 'cancel') {
            $transaction->status_transaksi = 'FAILED';
        }

        // Simpan Transaksi
        $transaction->save();

        // ambil data dengan program donasi
        $datadonatur = Transaction::with(['program_donation'])->where('id', $transaction->id)->firstOrFail();
        $namaemail = $datadonatur->email;

        // Kirim Email
        if ($transaction) {
            if ($status == 'capture' && $fraud == 'accept') {
                Mail::to($namaemail)->send(
                    new TransactionSuccess($datadonatur)
                );
            } else if ($status == 'settlement') {
                Mail::to($namaemail)->send(
                    new TransactionSuccess($datadonatur)
                );
            } else if ($status == 'success') {
                Mail::to($namaemail)->send(
                    new TransactionSuccess($datadonatur)
                );
            } else if ($status == 'capture' && $fraud == 'challenge') {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Challenge'
                    ]
                ]);
            } else {
                return response()->json([
                    'meta' => [
                        'code' => 200,
                        'message' => 'Midtrans Payment Not Settlement'
                    ]
                ]);
            }

            return response()->json([
                'meta' => [
                    'code' => 200,
                    'message' => 'Midtrans Payment success'
                ]
            ]);
        }
    }

    public function finishRedirect(Request $request)
    {
        return view('pages.user.success');
    }

    public function unfinishRedirect(Request $request)
    {
        return view('pages.user.unfinish');
    }

    public function errorRedirect(Request $request)
    {
        return view('pages.user.failed');
    }
}
