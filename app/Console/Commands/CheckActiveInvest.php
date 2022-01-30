<?php

namespace App\Console\Commands;

use App\Models\AllTransactions;
use Illuminate\Console\Command;

class CheckActiveInvest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:active';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        // return 0;
        $transactions = AllTransactions::all();

        foreach ($transactions as $item) {
            if ($item->status == "Ongoing") {
                if ($item->days_left == 0) {
                    $item->status == "Completed";
                    $item->save();
                } elseif ($item->days_left > 0 && $item->days_left <= $item->duration) {
                    $item->days_left = $item->days_left - 1;
                    $item->save();
                }
            }
        }
    }
}
