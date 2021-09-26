<?php

namespace App\Http\Resources\Customer;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CustomerCollection extends ResourceCollection
{
    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
