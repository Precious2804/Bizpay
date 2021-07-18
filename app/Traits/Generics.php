<?php

namespace app\Traits;

use App\Models\AllTransactions;
use App\Models\Coupones;
use App\Models\User;
use Illuminate\Support\Str;

trait Generics{

    // a function that generates a random unique ID
    function generateId(){
        $unique_id = (string) Str::uuid();
        $exploded = explode('-', $unique_id);
        $n_unique_id = $exploded[4];
        return $n_unique_id;
    }

    //a function that generates random numbers
    function generateRand(){
        $random = rand(100000, 999999);
        return $random;
    }
}