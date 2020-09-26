<?php declare(strict_types = 1);

namespace Database\Seeders;

use Carbon\Carbon;
use Exception;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActivitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        $faker = Factory::create();
        foreach(range(1, 50) as $index)
        {

            $year = random_int(2020, 2020);
            $month = random_int(10, 12);
            $day = random_int(1, 28);

            $date = Carbon::create($year,$month ,$day , 0, 0, 0);

            DB::table('activities')->insert([
                'title' => $faker->sentence(3),
                'description' => $faker->sentence(10),
                'from' => $date->format('Y-m-d H:i:s'),
                'to' => $date->addWeeks(random_int(1, 52))->format('Y-m-d H:i:s'),
                'popularity_rating' => $faker->randomDigit
            ]);

        }
    }
}
