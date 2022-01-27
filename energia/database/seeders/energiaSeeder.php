<?php

namespace Database\Seeders;

use App\Models\Energia;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class energiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $json = File::get("database/data/energia.json");
        $data = json_decode($json);

        foreach ($data as $key => $value) {
            Energia::create([
                "startDate" => $value->startDate,
                "endDate" => $value->endDate,
                "dayNight" => $value->dayNight,
                "day" => $value->day,
                "night" => $value->night
            ]);
        }
    }
}
