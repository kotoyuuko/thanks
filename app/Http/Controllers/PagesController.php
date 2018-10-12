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
        $payments = Payment::where('status', 'paid')->paginate(10);

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

        $client = new Client();
        $response = json_decode($client->post('https://api.void.cx/api/payment', [
            'query' => [
                'title' => '打赏 kotoyuuko 零花钱',
                'price' => $payment->price
            ]
        ])->getBody()->getContents(), true);

        $payment->payment_id = $response['id'];
        $payment->save();

        $agent = new Agent();

        if ($agent->isMobile()) {
            return redirect()->to($response['pay_url']);
        } else {
            return view('pages.payment', [
                'qrcode' => $response['qrcode']
            ]);
        }
    }
}
