<?php

namespace App\Http\Resources\MonthlyUsage;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MonthlyUsageCollection extends ResourceCollection
{
    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
