<?php

use Illuminate\Database\Seeder;

class PostCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $post_category = array(
            array(
                "slug" => "overseas-study",
                "name" => "海外留學",
            ),
            array(
                "slug" => "entrance-examination",
                "name" => "升學考試",
            ),
            array(
                "slug" => "international-school",
                "name" => "國際學校",
            ),
            array(
                "slug" => "course-selection-guidance",
                "name" => "選課輔導",
            ),
            array(
                "slug" => "campus-tour",
                "name" => "校園導覽",
            ),
            array(
                "slug" => "social-activity",
                "name" => "社團活動",
            ),
            array(
                "slug" => "work-internship",
                "name" => "工作實習",
            ),
            array(
                "slug" => "career-entrepreneurship",
                "name" => "職涯創業",
            ),
        );

        foreach($post_category as $category)
        {
            \App\PostCategory::create([
                'slug' => $category['slug'],
                'name' => $category['name']
            ]);
        }
    }
}
