<?php

namespace Database\Seeders;

use App\Models\book;
use Illuminate\Database\Seeder;
// use Database\Factories\BookFactory;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Book::factory()->count(100)->create();
    }
}
