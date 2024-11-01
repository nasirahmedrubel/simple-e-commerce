<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class Seedstatus extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $status = new Status;
        $status->name = 'Inactive';
        $status->save();

        $status2 = new Status;
        $status2->name = 'Active';
        $status2->save();
    }
}
