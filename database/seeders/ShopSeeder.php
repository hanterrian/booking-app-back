<?php

namespace Database\Seeders;

use App\Models\Admin\AdminAuthor;
use App\Models\Admin\AdminCategory;
use App\Models\Admin\AdminProduct;
use App\Models\Admin\AdminPublisher;
use App\Models\Admin\AdminTag;
use App\Models\Author;
use App\Models\Category;
use App\Models\Product;
use App\Models\Publisher;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShopSeeder extends Seeder
{
    public function run()
    {
        $categoriesLabel = [
            'Science Fiction and Fantasy',
            'Detectives and Thrillers',
            'Computers and Internet',
            'Reference literature',
            'Documentary literature',
            'Religion and spirituality',
            'Humor',
            'Story',
        ];

        $tagsLabel = [
            [
                'alternative history',
                'Fighting fiction',
                'Heroic fiction',
                'urban fantasy',
                'gothic romance',
            ],
            [
                'militants',
                'Ladies detective novel',
                'Ironic detectives',
                'Historical detectives',
            ],
            [
                'Database',
                'Internet',
                'Computer hardware',
                'OS and Networks',
                'Programming',
                'Software',
                'Other computer literature',
                'Digital signal processing',
            ],
            [
                'Other reference literature',
                'Guides',
                'Guides',
                'Dictionaries',
                'Reference books',
                'encyclopedias',
            ],
            [
                'Biographies and memoirs',
                'Military documentaries',
                'Art and Design',
                'Criticism',
                'sciencepop',
                'Other non-fiction',
                'Publicism',
            ],
            [
                'Astrology',
                'Buddhism',
                'Esoterics',
                'Paganism',
            ],
            [
                'jokes',
                'Comedy',
                'Other humor',
                'Satire',
                'humorous prose',
                'Humorous poems',
            ],
            [
                'Documentary literature',
                'historical literature',
                'historical fiction',
            ],
        ];

        foreach ($categoriesLabel as $key => $label) {
            $category = AdminCategory::create([
                'title' => $label,
                'sort' => $key,
                'published' => true,
            ]);

            $_tagsList = $tagsLabel[$key];

            foreach ($_tagsList as $_key => $tagLabel) {
                AdminTag::create([
                    'category_uuid' => $category->uuid,
                    'title' => $tagLabel,
                    'sort' => $_key,
                    'published' => true,
                ]);
            }
        }

        for ($i = 0; $i < 10; $i++) {
            AdminPublisher::create([
                'title' => fake()->text(15),
                'sort' => $i,
                'published' => true,
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            AdminAuthor::create([
                'name' => fake()->name,
                'sort' => $i,
                'published' => true,
            ]);
        }

        $this->generateProduct();
    }

    private function generateProduct()
    {
        for ($i = 0; $i < 150; $i++) {
            /** @var Publisher $publisher */
            $publisher = Publisher::inRandomOrder()->first();
            /** @var Author[] $authors */
            $authors = Author::inRandomOrder()->limit(rand(1, 3))->get();
            /** @var Category $category */
            $category = Category::inRandomOrder()->first();
            /** @var Tag[] $tags */
            $tags = $category->tags()->limit(rand(1, 3))->get();

            $product = new AdminProduct();

            $product->title = fake()->text(20);

            $product->sku = "SKU-".str_pad($i, 8, '0', STR_PAD_LEFT);

            $product->description = fake()->realTextBetween(200, 300);

            $product->stock = rand(10, 150);

            $product->price = rand(150, 300);

            $product->publisher()->associate($publisher);
            $product->category()->associate($category);

            $product->save();

            $product->authors()->attach($authors);
            $product->tags()->attach($tags);
        }
    }
}
