<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $customers = [
            [
                'name'    => 'Romi',
                'address' => 'Jl. Mawar No. 1, Jombang',
                'phone'   => '081234567891',
                'email'   => 'romi@gmail.com',
            ],
            [
                'name'    => 'Wahyu',
                'address' => 'Jl. Melati No. 2, Jombang',
                'phone'   => '081234567892',
                'email'   => 'wahyu@gmail.com',
            ],
            [
                'name'    => 'Eko',
                'address' => 'Jl. Kenanga No. 3, Jombang',
                'phone'   => '081234567893',
                'email'   => 'eko@gmail.com',
            ],
            [
                'name'    => 'Vendy',
                'address' => 'Jl. Anggrek No. 4, Jombang',
                'phone'   => '081234567894',
                'email'   => 'vendy@gmail.com',
            ],
            [
                'name'    => 'Dani',
                'address' => 'Jl. Dahlia No. 5, Jombang',
                'phone'   => '081234567895',
                'email'   => 'dani@gmail.com',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}