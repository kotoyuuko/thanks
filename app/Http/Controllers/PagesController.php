<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use App\Http\Requests\PayRequest;
use GuzzleHttp\Client;
use Jenssegers\Agent\Agent;

class PagesController extends Controller
{
    public function root()
    {
        $total = Payment::where('status', 'paid')->sum('price');
        $payments = Payment::where('status', 'paid')->orderBy('created_at', 'desc')->paginate(10);

        return view('pages.root', [
            'total' => $total / 100,
            'payments' => $payments
        ]);
    }

    public function pay(PayRequest $request)
    {
        $payment = Payment::create([
            'name' => $request->name,
            'email' => $request->email,
            'saying' => $request->saying,
            'price' => $request->price,
            'status' => 'unpaid'
        ]);

        $result = \Youzan::get('youzan.pay.qrcode.create', [
            'qr_type' => 'QR_TYPE_DYNAMIC',
            'qr_price' => $payment->price,
            'qr_name' => '打赏 '.env('MY_NAME', 'kotoyuuko').' 零花钱',
            'qr_source' => $payment->id,
        ]);
        $response = $result['response'];

        $payment->payment_id = $response['qr_id'];
        $payment->save();

        $agent = new Agent();

        if ($agent->isPhone()) {
            return redirect()->to($response['qr_url']);
        } else {
            return view('pages.payment', [
                'qrcode' => $response['qr_code']
            ]);
        }
    }
}
