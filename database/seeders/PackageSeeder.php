<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            [
                'name'        => 'Paket Basic',
                'bandwidth'   => 10,
                'price'       => 100000,
                'description' => 'Paket internet 10 Mbps untuk kebutuhan dasar',
            ],
            [
                'name'        => 'Paket Standard',
                'bandwidth'   => 20,
                'price'       => 175000,
                'description' => 'Paket internet 20 Mbps untuk kebutuhan sehari-hari',
            ],
            [
                'name'        => 'Paket Premium',
                'bandwidth'   => 50,
                'price'       => 300000,
                'description' => 'Paket internet 50 Mbps untuk kebutuhan bisnis',
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}