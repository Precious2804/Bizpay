<?php

namespace App\Console;

use App\Models\Coupones;
use Illuminate\Console\Application;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function(){
            $status = Coupones::all();
            // $expiration = Coupones::where('expire_at', '<=', now());
            foreach ($status as $item) {
                if($item->status == "Active" && $item->expire_at <= now()){
                    $item->expire_at->update(['status' => "Expired"]);
                }
            }
            
            $coupons = Coupones::all();
            foreach ($coupons as $coupon) {
                if($coupon->days_left > 0){
                    $coupon->days_left = $coupon->days_left - 1;
                    $coupon->save();
                } 
            }            
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
