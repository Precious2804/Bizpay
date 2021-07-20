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
            Coupones::where('expire_at', '<=', now())->update(['status' => "Expired"]);
            $coupons = Coupones::all();
            foreach ($coupons as $coupon) {
                if($coupon->days_left > 0){
                    $coupon->days_left = $coupon->days_left - 1;
                    $coupon->save();
                } 
            }            
        })->daily();
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
