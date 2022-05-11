<?php

namespace Database\Seeders;

use DateTime;
use Faker\Provider\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Entry;
use Faker\Factory;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->faker=Factory::create();
        $this->fakeEntries();
    }
    public function fakeEntries()
    {
        for ($i = 0; $i <25; $i++) {
            $date = $this->faker->dateTimeThisYear();
            $users = rand(1, 3);
            $quotes = rand(1, 1643);
            $imagenumber = rand(123, 181);
            $image=public_path('public/images'.($imagenumber).'.jpg');
             
            $entry = new Entry();
            $entry->created_at = $date;
            $entry->updated_at = $date;
            $entry->days = $date->format('l');
            $entry->notes = $this->faker->paragraphs(1, true);
            $entry->pic_url =  $image;//Image::imageUrl(400, 400, 'landscape', true, null, false);
            $entry->user_id = $users;
            $entry->quote_id = $quotes;

            $entry->save();
        }
    }
}