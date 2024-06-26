<?php

namespace Src\Domain\Deal\Http\Resources\Deal;

use Illuminate\Http\Request;
use Src\Infrastructure\Http\AbstractResources\BaseResource as JsonResource;

class DealResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function data(Request $request):array
    {
        return [
            'id'               => $this->id,
            'deal'             => $this->deal,
            'code'             => $this->code,
        ];
    }
}
