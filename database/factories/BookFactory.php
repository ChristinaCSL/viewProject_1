<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\book;

class BookFactory extends Factory
{
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'title'=>$this->faker->text($maxNbChars=100),
            'authorname'=>$this->faker->name,
            'description'=>'-',
            'publishyear'=>$this->faker->year,
            'qty'=>$this->faker->randomDigit,
            'price'=>$this->faker->randomDigit,
            'category_id'=>rand(1,20)
            // 'price'=>$this->faker->numberBetween($min=1500,$max=5000)
        ];
    }
}
