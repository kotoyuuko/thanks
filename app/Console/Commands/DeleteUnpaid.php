<?php

namespace App\Console\Commands;

use App\Payment;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteUnpaid extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'payment:clean';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete unpaid payments';

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
        $payments = Payment::where('created_at', '<', Carbon::parse('-30 minutes'))
            ->where('status', 'unpaid')
            ->get();
        
        foreach ($payments as $payment) {
            $payment->delete();
        }
    }
}
