<?php

use Illuminate\Database\Seeder;
// per lo slug
use Illuminate\Support\Str;
// inlcudo faker
use Faker\Generator as Faker;
// includo il model article
use App\Article;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // genero 10 articoli con faker
        for ($i=0; $i < 10; $i++) { 
            $newArticle = new Article();

            $newArticle->title = $faker->sentence(4);
            $newArticle->slug = Str::slug($newArticle->title);
            $newArticle->subtitle = $faker->sentence(9);
            $newArticle->image = $faker->imageUrl(640, 480, 'nature');
            $newArticle->author = $faker->name();
            $newArticle->content = $faker->text(750);
            $newArticle->publication_date = $faker->date();

            $newArticle->save();
        }
    }
}
