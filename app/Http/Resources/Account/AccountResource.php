<?php

namespace App\Http\Resources\Account;

use Illuminate\Http\Resources\Json\JsonResource;

class AccountResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return array_merge(
            parent::toArray($request),
            [
                'lifetime_usd_spend' => (string ) "$" . number_format($this->resource->monthlyUsages->sum('cents') / 100, 2)
            ]
        );
    }
}
