<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bill;

class BillSeeder extends Seeder
{
    public function run(): void
    {
        $bills = [
            [
                'customer_id' => 1,
                'package_id'  => 1,
                'month'       => 6,
                'year'        => 2026,
                'amount'      => 100000,
                'status'      => 'paid',
                'due_date'    => '2026-06-10',
                'paid_date'   => '2026-06-05',
            ],
            [
                'customer_id' => 2,
                'package_id'  => 2,
                'month'       => 6,
                'year'        => 2026,
                'amount'      => 175000,
                'status'      => 'unpaid',
                'due_date'    => '2026-06-10',
                'paid_date'   => null,
            ],
            [
                'customer_id' => 3,
                'package_id'  => 3,
                'month'       => 6,
                'year'        => 2026,
                'amount'      => 300000,
                'status'      => 'paid',
                'due_date'    => '2026-06-10',
                'paid_date'   => '2026-06-03',
            ],
            [
                'customer_id' => 4,
                'package_id'  => 1,
                'month'       => 6,
                'year'        => 2026,
                'amount'      => 100000,
                'status'      => 'unpaid',
                'due_date'    => '2026-06-10',
                'paid_date'   => null,
            ],
            [
                'customer_id' => 5,
                'package_id'  => 2,
                'month'       => 6,
                'year'        => 2026,
                'amount'      => 175000,
                'status'      => 'unpaid',
                'due_date'    => '2026-06-10',
                'paid_date'   => null,
            ],
        ];

        foreach ($bills as $bill) {
            Bill::create($bill);
        }
    }
}