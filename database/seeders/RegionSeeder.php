<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/wilayah_2020.json");
        $data = json_decode($json, true);
        $chunks = array_chunk($data, 5000);

        foreach ($chunks as $obj) {
            Region::insert(
                $obj,
            );
        }
    }
}
