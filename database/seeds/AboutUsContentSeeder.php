<?php

use App\AboutUsContent;
use Illuminate\Database\Seeder;

class AboutUsContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUsContent::create([
            'content' => '我們誠摯邀請超過 600 位學長姐加入易子學的行列，目標是讓易子學的服務涵蓋全球百大大學。這些學長姐不論是就讀於國內外大 學、高中國際學校，或是在實習或正式職場中，憑藉自身的經驗，提供第一手的校園資訊，協助以知識交流來實現知識平權。這一 使命與聯合國永續發展目標中的「減少不平等」、「提供優質教育和終身學習機會」以及「促進充分就業和適當工作」完全一致。 在平台運營上，我們秉持企業社會責任（CSR）原則，深信對社會和環境承擔責任遠比單純追求利潤更加重要。基於這一信念，我們致力於建立可持續的業務模式，透過創新和合作，推動知識平權。 「20% for the young lion」計畫是我們回饋給知識平權的主 要方式之一，易子學承諾捐出每年銷售額的 20％，將資金用於支持世代交流， 以及跨越地域、文化、語言的遠距學習。'
        ]);
    }
}
