<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Account\AccountCollection;

class AccountController extends Controller
{
    public function index(Request $request, Customer $customer)
    {
        return AccountCollection::make($customer->accounts)->additional([
            'customer' => $customer,
            'message' => trans('messages.accounts.index'),
        ]);
    }
}
