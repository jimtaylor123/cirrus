<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Account\AccountCollection;
use App\Http\Resources\MonthlyUsage\MonthlyUsageCollection;

class MonthlyUsageController extends Controller
{
    public function index(Request $request, Account $account)
    {
        return MonthlyUsageCollection::make($account->monthlyUsages)->additional([
            'customer' => $account->customer,
            'account' => $account,
            'message' => trans('messages.monthlyUsages.index'),
        ]);
    }
}
