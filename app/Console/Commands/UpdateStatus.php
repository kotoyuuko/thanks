<?php

namespace App\Console\Commands;

use App\Payment;
use GuzzleHttp\Client;
use Illuminate\Console\Command;

class UpdateStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update payments status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $payments = Payment::where('status', 'unpaid')->get();

        foreach ($payments as $payment) {
            $result = \Youzan::get('youzan.trades.qr.get', [
                'qr_id' => $payment->payment_id,
                'status' => 'TRADE_RECEIVED'
            ]);
            $response = $result['response'];

            if ($response['total_results'] > 0) {
                $payment->status = 'paid';
                $payment->save();
            }
        }
    }
}
