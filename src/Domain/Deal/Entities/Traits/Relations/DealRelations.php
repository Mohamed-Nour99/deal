<?php

namespace Src\Domain\Deal\Entities\Traits\Relations;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\Relations\MorphedByMany;
use Src\Domain\Deal\Entities\DealPercentage;

trait DealRelations
{
    ###allowedRelations###
    ###\allowedRelations###

    public function dealPercentages(): HasMany
    {
        return $this->hasMany(DealPercentage::class , 'deal_id' , 'id');
    }
}
