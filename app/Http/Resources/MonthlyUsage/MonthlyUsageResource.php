<?php

namespace App\Http\Resources\MonthlyUsage;

use Illuminate\Http\Resources\Json\JsonResource;

class MonthlyUsageResource extends JsonResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
