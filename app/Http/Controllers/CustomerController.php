<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Http\Resources\Customer\CustomerCollection;

class CustomerController extends Controller
{
    public function index(): CustomerCollection
    {
        return CustomerCollection::make(Customer::all())->additional([
            'message' => trans('messages.customers.index'),
        ]);
    }
}
