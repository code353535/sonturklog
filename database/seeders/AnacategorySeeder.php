<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnacategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('anacategory')->insert([

            [
                'ad' => 'Blog',
                'slug' => 'blog',
                'aciklama' => '',
            ],

            [
                'ad' => 'Haber',
                'slug' => 'haber',
                'aciklama' => '',
            ],

                ]);
    }
}
