<?php

use Illuminate\Database\Seeder;

class ComTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coms')->insert([
            ['id' => '1','name' => 'ABOBO', 'lat' => 5.3997151, 'lng' => -4.0624351, 'zoom' => 13, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '2','name' => 'ADJAME', 'lat' => 5.363557, 'lng' => -4.0353806, 'zoom' => 13.78, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '3','name' => 'ATTECOUBE ', 'lat' => 5.3308055, 'lng' => -4.0504486, 'zoom' => 13.78, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '4','name' => 'COCODY', 'lat' => 5,3853855, 'lng' => -3.9788309, 'zoom' => 12.78, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '5','name' => 'KOUMASSI', 'lat' => 5.2923366, 'lng' => -3.9566315, 'zoom' => 13.7, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '6','name' => 'MARCORY', 'lat' => 5.2943176, 'lng' => -4,014365, 'zoom' => 13, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '7','name' => 'PLATEAU', 'lat' => 5.3266573, 'lng' => -4.0376704, 'zoom' => 14, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '8','name' => 'PORTBOUET', 'lat' => 5.2469413, 'lng' => -3.9647049, 'zoom' => 12.78, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '9','name' => 'TREICHVILLE', 'lat' => 5.2941468, 'lng' => -4.0269229, 'zoom' => 14, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '10','name' => 'YOPOUGON', 'lat' => 5.3468581, 'lng' => -4.131097, 'zoom' => 13.04, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '11','name' => 'ANYAMA', 'lat' => 1, 'lng' => 1, 'zoom' => 1, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '12','name' => 'BASSAM', 'lat' => 5.2225726, 'lng' => -3.7521651, 'zoom' => 14.04, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '13','name' => 'BINGERVILLE', 'lat' => 5.3456958, 'lng' => -3.8779663, 'zoom' => 14, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],
            ['id' => '14','name' => 'SONGON', 'lat' => 5.3297765, 'lng' => -4.2208846, 'zoom' => 12.92, 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()],

        ]);
    }
}
