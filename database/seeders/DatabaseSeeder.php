<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user1 = \App\Models\User::create([
            'unique_id'=>'123456',
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'email' => 'admin@millionaire.com',
            'phone' => '0000000',
            'isAdmin' => '1',
            'referral'=>'admin',
            'isVerified'=>'1',
            'ref_bonus'=>'0000000',
            'password' => Hash::make('admin'),
        ]);

        $bank1 = \App\Models\BankCodes::create([
            'id'=>'1',
            'codes'=>'044',
            'bank_name'=>'Access Bank Nigeria Plc'
        ]);
        $bank2 = \App\Models\BankCodes::create([
            'id'=>'2',
            'codes'=>'063',
            'bank_name'=>'Diamond Bank Plc'
        ]);
        $bank3 = \App\Models\BankCodes::create([
            'id'=>'3',
            'codes'=>'050',
            'bank_name'=>'Ecobank Nigeria'
        ]);
        $bank4 = \App\Models\BankCodes::create([
            'id'=>'4',
            'codes'=>'084',
            'bank_name'=>'Enterprise Bank Plc'
        ]);
        $bank5 = \App\Models\BankCodes::create([
            'id'=>'5',
            'codes'=>'070',
            'bank_name'=>'Fidelity Bank Plc'
        ]);
        $bank6 = \App\Models\BankCodes::create([
            'id'=>'6',
            'codes'=>'011',
            'bank_name'=>'First Bank of Nigeria Plc'
        ]);
        $bank7 = \App\Models\BankCodes::create([
            'id'=>'7',
            'codes'=>'214',
            'bank_name'=>'First City Monument Bank'
        ]);
        $bank8 = \App\Models\BankCodes::create([
            'id'=>'8',
            'codes'=>'058',
            'bank_name'=>'Guaranty Trust Bank Plc'
        ]);
        $bank9 = \App\Models\BankCodes::create([
            'id'=>'9',
            'codes'=>'030',
            'bank_name'=>'Heritaage Banking Company Ltd'
        ]);
        $bank10 = \App\Models\BankCodes::create([
            'id'=>'10',
            'codes'=>'301',
            'bank_name'=>'Jaiz Bank'
        ]);
        $bank11 = \App\Models\BankCodes::create([
            'id'=>'11',
            'codes'=>'082',
            'bank_name'=>'Keystone Bank Ltd'
        ]);
        $bank12 = \App\Models\BankCodes::create([
            'id'=>'12',
            'codes'=>'014',
            'bank_name'=>'Mainstreet Bank Plc'
        ]);
        $bank13 = \App\Models\BankCodes::create([
            'id'=>'13',
            'codes'=>'076',
            'bank_name'=>'Skye Bank Plc'
        ]);
        $bank14 = \App\Models\BankCodes::create([
            'id'=>'14',
            'codes'=>'039',
            'bank_name'=>'Stanbic IBTC Plc'
        ]);
        $bank15 = \App\Models\BankCodes::create([
            'id'=>'15',
            'codes'=>'232',
            'bank_name'=>'Sterling Bank Plc'
        ]);
        $bank16 = \App\Models\BankCodes::create([
            'id'=>'16',
            'codes'=>'032',
            'bank_name'=>'Union Bank Nigeria Plc'
        ]);
        $bank17 = \App\Models\BankCodes::create([
            'id'=>'17',
            'codes'=>'033',
            'bank_name'=>'United Bank for Africa Plc'
        ]);
        $bank18 = \App\Models\BankCodes::create([
            'id'=>'18',
            'codes'=>'215',
            'bank_name'=>'Unity Bank Plc'
        ]);
        $bank19 = \App\Models\BankCodes::create([
            'id'=>'19',
            'codes'=>'035',
            'bank_name'=>'WEMA Bank Plc'
        ]);
        $bank20 = \App\Models\BankCodes::create([
            'id'=>'20',
            'codes'=>'057',
            'bank_name'=>'Zenith Bank International'
        ]);

        $adminAcct = \App\Models\AdminBankDetails::create([
            'bank'=>"Admin Bank name",
            'number'=>"002302920920",
            'name'=>"Admin Account name",
            'contact'=>"09292929299"
        ]);
    }
}
