<?php

namespace App\Models;

use App\Models\Account;
use App\Models\MonthlyUsage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Customer extends Model
{
    use HasFactory;

    public function accounts(): HasMany
    {
        return $this->hasMany(Account::class);
    }

    public function monthlyUsages(): HasManyThrough
    {
        return $this->hasManyThrough(MonthlyUsage::class, Account::class);
    }
}
