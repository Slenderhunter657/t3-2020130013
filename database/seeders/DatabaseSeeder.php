<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Book;
use App\Models\Author;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('en_UK');
        $a = random_int(1,999999);
        $faker->seed($a);

        for ($i = 0; $i < 3; $i++) {
            Author::create([
                'name' => $faker->name(),
                'date_of_birth' => $faker->date('Y-m-d', '1999-01-01'),
                'email' => $faker->safeEmail(),
            ]);
        }

        $cat = [
            "Action",
            "Adventure",
            "Boys Love",
            "Comedy",
            "Documentary",
            "Drama",
            "Education",
            "Fantasy",
            "Girls Love",
            "History",
            "Horror",
            "Life Style",
            "Manga",
            "Manhua",
            "Mystery",
            "Psychological",
            "Romance",
            "Sci-Fi",
            "Sports",
            "Supernatural"
        ];
        $author = Author::all();
        $author_count = $author->count();
        $tempId = "B0000";
        for ($i = 0; $i < 10; $i++) {
            // $catRnd = random_int(0,19);
            $title = $faker->sentence(3);
            ++$tempId;
            Book::create([
                'id' => $tempId,
                'title' => rtrim($title, "."),
                'page' => $faker->randomNumber(3),
                'category' => $faker->randomElement($cat),
                'publisher' => $faker->word(),
                'author_id' => random_int(1,$author_count),
            ]);
        }
    }
}
