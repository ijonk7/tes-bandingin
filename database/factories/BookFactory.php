<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement($array = array ('Book A', 'Book B', 'Book C', 'Book D', 'Book E', 'Book F', 'Book G', 'Book H', 'Book I', 'Book J', 'Book K', 'Book L', 'Book M', 'Book N', 'Book O', 'Book P', 'Book Q', 'Book R', 'Book S', 'Book T', 'Book U', 'Book V', 'Book W', 'Book X', 'Book Y', 'Book Z')),
        ];
    }
}
