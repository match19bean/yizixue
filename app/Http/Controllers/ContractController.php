<?php

namespace App\Http\Controllers;

use App\Disclaimer;
use App\MemberAgreement;
use App\Privacy;
use App\ServiceAgreement;
use App\SubscriptionAgreement;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function membershipAgreement()
    {
        $contract = MemberAgreement::first();
        return view('contract.membership-agreement', compact('contract'));
    }

    public function serviceAgreement()
    {
        $contract = ServiceAgreement::first();
        return view('contract.service-agreement', compact('contract'));
    }
    public function disclaimer()
    {
        $contract = DisClaimer::first();
        return view('contract.disclaimer', compact('contract'));
    }

    public function subscriptionAgreement()
    {
        $contract = SubscriptionAgreement::first();
        return view('contract.subscription-agreement', compact('contract'));
    }

    public function privacy()
    {
        $contract = Privacy::first();
        return view('contract.privacy', compact('contract'));
    }
}
