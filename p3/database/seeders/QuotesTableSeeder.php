<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quote;

use Faker\Factory;

class QuotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private $faker;
    public function run()
    {
        $this->faker = Factory::create();

        $this->buildQuoteLibrary();
    }

    private function buildQuoteLibrary()
    {
        $quoteData = file_get_contents(database_path('quotes.json'));
        $quotes = json_decode($quoteData, true);

        foreach ($quotes as $quoteData) {
            $quote = new Quote();
            
            $quote->created_at = $this->faker->dateTimeThisMonth();
            $quote->updated_at = $quote->created_at;
            $quote->author = $quoteData['author'];
            $quote->text = $quoteData['text'];
            
            $quote->save();
        }
    }
}