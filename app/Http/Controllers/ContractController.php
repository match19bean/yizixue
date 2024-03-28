<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function membershipAgreement()
    {
        return view('contract.membership-agreement');
    }

    public function serviceAgreement()
    {
        return view('contract.service-agreement');
    }
    public function disclaimer()
    {
        return view('contract.disclaimer');
    }

    public function subscriptionAgreement()
    {
        return view('contract.subscription-agreement');
    }
}
