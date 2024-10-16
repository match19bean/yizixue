<?php

namespace App\Http\Controllers;

use App\SmsConfirm;
use Illuminate\Http\Request;

class SmsContractController extends Controller
{
    public function index(){
        $Data['country_codes'] = [
            886=>'台灣 Taiwan',
//            86=>'中國 China',
            852=>'香港 Hong Kong',
//            91=>'印度 India',
//            960=>'馬爾地夫 Maldives',
//            62=>'印尼 Indonesia',
//            98=>'伊朗 Iran',
//            964=>'伊拉克 Irag',
//            972=>'以色列 Israel',
            81=>'日本 Japan',
//            677=>'所羅門群島 Solomon IS.',
//            94=>'斯里蘭卡 Sri Lanka',
//            66=>'泰國 Thailand',
            82=>'南韓 Korea South',
//            965=>'科威特 Kuwait',
//            92=>'巴基斯坦 Pakistan',
            853=>'澳門 Macao',
            60=>'馬來西亞 Malaysia',
//            63=>'菲律賓 Philippines',
//            966=>'沙烏地阿拉伯 Saudi Arabia',
            65=>'新加坡 Singapore',
//            977=>'尼泊爾 Nepal',
//            66=>'葉門 Yemen Rep.',
//            90=>'土耳其 Turkey',
//            84=>'越南 Vietnam',
//            54=>'阿根廷 Argentina',
            1=>'美國 U.S.A./加拿大 Canada',
//            56=>'智利 Chile',
//            57=>'哥倫比亞 Colombia',
//            1809=>'多明尼亞',
//            507=>'巴拿馬 Panama',
//            504=>'宏都拉斯 Honduras',
//            505=>'尼加拉瓜 Nicaragua',
//            593=>'厄瓜多爾',
//            52=>'墨西哥 Mexico',
//            598=>'烏拉圭 Uruguay',
//            502=>'瓜地馬拉 Guatemala',
//            506=>'哥斯大黎加 Casta Rica',
//            55=>'巴西 Brazil',
//            351=>'葡萄牙 Portugal',
            34=>'西班牙 Spain',
//            46=>'瑞典 Sweden',
            41=>'瑞士 Switzerland',
            44=>'英國 U.K.',
            49=>'德國 Germany',
//            7=>'俄羅斯 C.I.S (Russia)',
//            36=>'匈牙利 Hungary',
//            354=>'冰島 Iceland',
//            353=>'愛爾蘭 Ireland',
//            356=>'馬爾他 Malta',
//            30=>'希臘 Hellenic',
            39=>'義大利 Italy',
//            352=>'盧森堡 Luxembourg',
            31=>'荷蘭 Netherlands',
//            47=>'挪威 Norway',
//            48=>'波蘭 Poland',
//            40=>'羅馬尼亞 Romania',
//            43=>'奧地利 Austria',
            32=>'比利時 Belgium',
            45=>'丹麥 Denmark',
            358=>'法國 France',//芬蘭 Finland/
            61=>'澳洲 Australia',
//            680=>'帛琉 Palau',
//            679=>'斐濟 Fiji',
//            671=>'關島 Guam',
            64=>'紐西蘭 New Zealand',
//            234=>'奈及利亞 Nigeria',
//            27=>'南非 South Africa Rep.',
//            254=>'肯亞 Kenya'
        ];
        return view('contract.sms-confirm', compact(['Data']));
    }

    public function store(Request $request){
        if($request->sms_confirm) {
            $request->validate([
                'phone' => ['required', 'numeric'],
            ]);
            SmsConfirm::create([
                'country_code' => $request->country_code,
                'phone' => $request->phone
            ]);
        }
        return redirect(route('register'));
    }
}
