<?php

namespace Src\Domain\Deal\Http\Resources\DealPercentage;

use Illuminate\Http\Request;
use Src\Infrastructure\Http\AbstractResources\BaseResource as JsonResource;

class DealPercentageResource extends JsonResource
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
            'id'                          => $this->id,
            'deal_percentage'             => $this->deal_percentage,
            'deal_id'             => $this->deal_id,
            'agent_id'             => $this->agent_id,
            'type'             => $this->type,

        ];
    }
}
