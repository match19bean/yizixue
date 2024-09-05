<?php

use App\University;
use Illuminate\Database\Seeder;

class AddChinaUniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $universities = [
            ['english_name'=>'Peking University', 'chinese_name'=>'北京大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN01'],
            ['english_name'=>'Tsinghua University', 'chinese_name'=>'清華大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN02'],
            ['english_name'=>'Jiao Tong University', 'chinese_name'=>'交通大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN03'],
            ['english_name'=>'Fudan University', 'chinese_name'=>'復旦大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN04'],
            ['english_name'=>'Renmin University of China', 'chinese_name'=>'中國人民大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN05'],
            ['english_name'=>'Beijing Foreign Studies University', 'chinese_name'=>'北京外國語大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN06'],
            ['english_name'=>'Communication University of China', 'chinese_name'=>'中國傳媒大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN07'],
            ['english_name'=>'Tongji University', 'chinese_name'=>'同濟大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN08'],
            ['english_name'=>'East China Normal University', 'chinese_name'=>'華東師範大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN09'],
            ['english_name'=>'East China University of Science and Technology', 'chinese_name'=>'華東理工大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN10'],
            ['english_name'=>'Donghua University', 'chinese_name'=>'東華大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN11'],
            ['english_name'=>'Shanghai University of Finance and Economics', 'chinese_name'=>'上海財經大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN12'],
            ['english_name'=>'Shanghai University', 'chinese_name'=>'上海大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN13'],
            ['english_name'=>'Nanjing University', 'chinese_name'=>'南京大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN14'],
            ['english_name'=>'Southeast University', 'chinese_name'=>'東南大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN15'],
            ['english_name'=>'Soochow University China', 'chinese_name'=>'蘇州大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN16'],
            ['english_name'=>'Zhejiang University', 'chinese_name'=>'浙江大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN17'],
            ['english_name'=>'Universitas Amoiensis', 'chinese_name'=>'廈門大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN18'],
            ['english_name'=>'Fuzhou University', 'chinese_name'=>'福州大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN19'],
            ['english_name'=>'Wuhan University', 'chinese_name'=>'武漢大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN20'],
            ['english_name'=>'Guangzhou University of Chinese Medicine', 'chinese_name'=>'廣州中醫藥大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN21'],
            ['english_name'=>'Sun Yat-sen University', 'chinese_name'=>'中山大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN22'],
            ['english_name'=>'Jinan University', 'chinese_name'=>'暨南大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN23'],
            ['english_name'=>'Sichuan University', 'chinese_name'=>'四川大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN24'],
            ['english_name'=>'Chengdu University of Traditional Chinese Medicine', 'chinese_name'=>'成都中醫藥大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN25'],
            ['english_name'=>'Chongqing University', 'chinese_name'=>'重慶大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN26'],
            ['english_name'=>'Shanghai Conservatory of Music', 'chinese_name'=>'上海音樂學院','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN27'],
            ['english_name'=>'Harbin Institute of Technology', 'chinese_name'=>'哈爾濱工業大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN28'],
            ['english_name'=>'Northeastern University China', 'chinese_name'=>'東北大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN29'],
            ['english_name'=>'Huazhong University of Science & Technology', 'chinese_name'=>'華中科技大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN30'],
            ['english_name'=>'Beijing Institute of Technology', 'chinese_name'=>'北京理工大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN31'],
            ['english_name'=>'ShanghaiTech University', 'chinese_name'=>'上海科技大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN32'],
            ['english_name'=>'Nanjing University of Chinese Medicine', 'chinese_name'=>'南京中醫藥大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN33'],
            ['english_name'=>'China Pharmaceutical University', 'chinese_name'=>'中國醫科大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN34'],
            ['english_name'=>'Nanjing Normal University', 'chinese_name'=>'南京師範大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN35'],
            ['english_name'=>'Shandong University', 'chinese_name'=>'山東大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN36'],
            ['english_name'=>'Beijing Normal University', 'chinese_name'=>'北京師範大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN37'],
            ['english_name'=>'Minzu University of China', 'chinese_name'=>'中央民族大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN38'],
            ['english_name'=>'Central University of Finance and Economics', 'chinese_name'=>'中央財經大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN39'],
            ['english_name'=>'Zhengfa University', 'chinese_name'=>'中國政法大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN40'],
            ['english_name'=>'Central Conservatory of Music', 'chinese_name'=>'中央音樂學院','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN41'],
            ['english_name'=>'Central Academy of Fine Arts', 'chinese_name'=>'中央美術學院','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN42'],
            ['english_name'=>'China Academy of Art', 'chinese_name'=>'中國美術學院','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN43'],
            ['english_name'=>'Shanghai International Studies University', 'chinese_name'=>'上海外國語大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN44'],
            ['english_name'=>'China Conservatory of Music', 'chinese_name'=>'中國音樂學院','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN45'],
            ['english_name'=>'South China University of Technology', 'chinese_name'=>'華南理工大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN46'],
            ['english_name'=>'Chinese Academy of Science', 'chinese_name'=>'中國科學院','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN47'],
            ['english_name'=>'Shenzhen University', 'chinese_name'=>'深圳大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN48'],
            ['english_name'=>'Hunan University', 'chinese_name'=>'湖南大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN49'],
            ['english_name'=>'China Agricultural University', 'chinese_name'=>'中國農業大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN50'],
            ['english_name'=>'Nankai University', 'chinese_name'=>'南開大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN51'],
            ['english_name'=>'Tianjin University', 'chinese_name'=>'天津大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN52'],
            ['english_name'=>'Dalian University of Technology', 'chinese_name'=>'大連理工大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN53'],
            ['english_name'=>'Jilin University', 'chinese_name'=>'吉林大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN54'],
            ['english_name'=>'Northwestern Polytechnical University', 'chinese_name'=>'西北工業大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN55'],
            ['english_name'=>'University of Science and Technology of China', 'chinese_name'=>'中國科學技術大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN56'],
            ['english_name'=>'China University of Petroleum', 'chinese_name'=>'中國石油大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN57'],
            ['english_name'=>'Central South University', 'chinese_name'=>'中南大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN58'],
//            ['english_name'=>'South China University of Technology', 'chinese_name'=>'華南理工大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN59'],
            ['english_name'=>'University of Electronic Science and Technology of China', 'chinese_name'=>'電子科技大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN60'],
//            ['english_name'=>'Northwestern Polytechnical University', 'chinese_name'=>'西北工業大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN61'],
            ['english_name'=>'Northwest A&F University', 'chinese_name'=>'西北農林科技大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN62'],
            ['english_name'=>'Lanzhou University', 'chinese_name'=>'蘭州大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN63'],
            ['english_name'=>'Beihang University', 'chinese_name'=>'北京航空航天大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN64'],
            ['english_name'=>'Ocean University of China', 'chinese_name'=>'中國海洋大學','country'=>'CHINA','area'=>null,'state'=>null, 'school_badge'=>'CN65']
        ];
        foreach($universities as $university){
            \App\University::create([
                'slug' => str_slug($university['english_name']),
                'name' => $university['chinese_name'],
                'english_name' => $university['english_name'],
                'chinese_name' => $university['chinese_name'],
                'country' => \Illuminate\Support\Str::upper($university['country']),
                'area' => $university['area'],
                'state' => $university['state'],
                'school_badge' => \Illuminate\Support\Str::upper($university['school_badge']),
                'image_path' => 'university/'.\Illuminate\Support\Str::upper($university['country']).'/'.\Illuminate\Support\Str::upper($university['school_badge']).'.png'
            ]);
        }
    }
}
