<?php

use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $skill = array(
            array(
                "slug" => "math",
                "name" => "數學",
            ),
            array(
                "slug" => "commerce",
                "name" => "商學",
            ),
            array(
                "slug" => "project",
                "name" => "工程",
            ),
            array(
                "slug" => "information",
                "name" => "資訊",
            ),
            array(
                "slug" => "biology",
                "name" => "生物",
            ),
            array(
                "slug" => "medicine",
                "name" => "醫學",
            ),
            array(
                "slug" => "pharmacy",
                "name" => "藥學",
            ),
            array(
                "slug" => "law",
                "name" => "法律",
            ),
            array(
                "slug" => "art",
                "name" => "藝術",
            ),
            array(
                "slug" => "society",
                "name" => "社會",
            ),
            array(
                "slug" => "literature",
                "name" => "文學",
            ),
            array(
                "slug" => "physics",
                "name" => "物理",
            ),
            array(
                "slug" => "chemical",
                "name" => "化學",
            ),
            array(
                "slug" => "gaming",
                "name" => "電競",
            ),
            array(
                "slug" => "agriculture",
                "name" => "農業",
            ),
            array(
                "slug" => "material",
                "name" => "材料",
            ),
            array(
                "slug" => "digit",
                "name" => "數位",
            ),
            array(
                "slug" => "spread",
                "name" => "傳播",
            ),
            array(
                "slug" => "healthy",
                "name" => "健康",
            ),
            array(
                "slug" => "energy",
                "name" => "能源",
            ),
            array(
                "slug" => "design",
                "name" => "設計",
            ),
            array(
                "slug" => "architecture",
                "name" => "建築",
            ),
            array(
                "slug" => "mechanical",
                "name" => "機械",
            ),
            array(
                "slug" => "transportation",
                "name" => "運輸",
            ),
            array(
                "slug" => "AP",
                "name" => "AP",
            ),
            array(
                "slug" => "IB",
                "name" => "IB",
            ),
            array(
                "slug" => "A-level",
                "name" => "A-level",
            ),
            array(
                "slug" => "TOEFL",
                "name" => "TOEFL",
            ),
            array(
                "slug" => "IELTS",
                "name" => "IELTS",
            ),
            array(
                "slug" => "TOEIC",
                "name" => "TOEIC",
            ),
            array(
                "slug" => "SAT",
                "name" => "SAT",
            ),
            array(
                "slug" => "GRE",
                "name" => "GRE",
            ),
            array(
                "slug" => "GMAT",
                "name" => "GMAT",
            ),
        );

        foreach($skill as $item) {
            \App\Skill::create([
                'slug' => $item['slug'],
                'name' => $item['name']
            ]);
        }
    }
}
