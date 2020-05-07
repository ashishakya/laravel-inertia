<?php

use App\Package;
use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.of
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'       => 'Monthly Package',
                'amount'     => 1000,
                'no_of_days' => 30,
            ],
            [
                'name'       => 'Half Yearly Package',
                'amount'     => 5000,
                'no_of_days' => 180,
            ],
            [
                'name'       => 'Yearly Package',
                'amount'     => 10000,
                'no_of_days' => 365,
            ],
        ];

        collect($data)->each(
            function ($data) {
                Package::create($data);
            }
        );
    }
}
