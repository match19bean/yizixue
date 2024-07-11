<?php

use App\YizixueFaqCarousel;
use Illuminate\Database\Seeder;

class YizixueFaqCarouselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        YizixueFaqCarousel::create([
            'image_path' => 'images/aboutUsBanner-1.jpg'
        ]);
    }
}
