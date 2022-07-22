<?php

namespace Database\Seeders;

use App\Models\Admin\AdminCategory;
use App\Models\Admin\AdminTag;
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
    }
}
