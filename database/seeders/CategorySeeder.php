<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([

            [
                'ad' => 'Müzik',
                'slug' => 'muzik',
                'anacategory_id' => '1',
                'aciklama' => '',
            ],

            [
                'ad' => 'Sinema ve Dizi',
                'slug' => 'sinema-ve-dizi',
                'anacategory_id' => '1',
                'aciklama' => '',
            ],
            [
                'ad' => 'Seyahat ve Gezi',
                'slug' => 'seyahat-ve-gezi',
                'anacategory_id' => '1',
                'aciklama' => '',
            ],
            [
                'ad' => 'Yemek',
                'slug' => 'yemek',
                'anacategory_id' => '1',
                'aciklama' => '',
            ],
            [
                'ad' => 'Fitness',
                'slug' => 'fitness',
                'anacategory_id' => '1',
                'aciklama' => '',
            ],
            [
                'ad' => 'Sağlık',
                'slug' => 'saglik',
                'anacategory_id' => '1',
                'aciklama' => '',
            ],
            [
                'ad' => 'Programlama',
                'slug' => 'programlama',
                'anacategory_id' => '1',
                'aciklama' => '',
            ],

            [
                'ad' => 'Hayvanlar',
                'slug' => 'hayvanlar',
                'anacategory_id' => '1',
                'aciklama' => '',
            ],
            [
                'ad' => 'Bilim',
                'slug' => 'bilim',
                'anacategory_id' => '1',
                'aciklama' => '',
            ],
            [
                'ad' => 'Oyun',
                'slug' => 'oyun',
                'anacategory_id' => '1',
                'aciklama' => '',
            ],
            [
                'ad' => 'Teknoloji',
                'slug' => 'teknoloji',
                'anacategory_id' => '1',
                'aciklama' => '',
            ],
            [
                'ad' => 'Girişimcilik',
                'slug' => 'girisimcilik',
                'anacategory_id' => '1',
                'aciklama' => '',
            ],

        [
            'ad' => 'Beslenme ve Diyet',
            'slug' => 'beslenme-ve-diyet',
            'anacategory_id' => '1',
            'aciklama' => '',
        ],
        [
            'ad' => 'Astroloji',
            'slug' => 'astroloji',
            'anacategory_id' => '1',
            'aciklama' => '',
        ],
        [
            'ad' => 'Moda ve Güzellik',
            'slug' => 'moda-ve-guzellik',
            'anacategory_id' => '1',
            'aciklama' => '',
        ],
        [
            'ad' => 'Gündem',
            'slug' => 'gundem',
            'anacategory_id' => '2',
            'aciklama' => '',
        ],
        [
            'ad' => 'Ekonomi',
            'slug' => 'ekonomi',
            'anacategory_id' => '2',
            'aciklama' => '',
        ],
        [
            'ad' => 'Spor',
            'slug' => 'spor',
            'anacategory_id' => '2',
            'aciklama' => '',
        ],
        [
            'ad' => 'Dünya',
            'slug' => 'dunya',
            'anacategory_id' => '2',
            'aciklama' => '',
        ],
        [
            'ad' => 'Türkiye',
            'slug' => 'turkiye',
            'anacategory_id' => '2',
            'aciklama' => '',
        ],
                ]);
    }
}
