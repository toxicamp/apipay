<?php

namespace App\Console\Commands;

use App\Service\EasypayHelper;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class WalletSynhCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wallet:synh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'wallet synchronization';

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
     * @return int
     */
    public function handle()
    {
        $easyHelp = new EasypayHelper();
        $easyHelp->getToken();

        $easyHelp->loginAuth();
        $wallets = $easyHelp->getWallets();

        $users = DB::table('users')->whereNotNull('api_token')->chunk(50, function ($users) use($wallets){
            foreach ($users as $user){
                $payments = $user->payments()->whereNotNull('easypay_id')->get();
                foreach ($payments as $payment){
                    foreach ($wallets as $wallet){

                        if ($wallet ['number'] == $payment->number){
                            $payment->balance = $wallet['balance'];
                        }
                    }
                }
            }
        });
    }
}
