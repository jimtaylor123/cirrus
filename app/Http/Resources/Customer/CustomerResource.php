<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return array_merge(
            parent::toArray($request),
            [
                'total_accounts' => $this->resource->accounts->count(),
                'lifetime_usd_spend' => (string ) "$" . number_format($this->resource->monthlyUsages->sum('cents') / 100, 2)
            ]
        );
    }
}
