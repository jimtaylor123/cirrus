<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
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
