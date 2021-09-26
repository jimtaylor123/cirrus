<?php

namespace App\Http\Resources\Account;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AccountCollection extends ResourceCollection
{
    /**
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return parent::toArray($request);
    }
}
