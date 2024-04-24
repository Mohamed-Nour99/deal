<?php

namespace Src\Domain\Deal\Repositories\Eloquent;

use Src\Domain\Deal\Repositories\Contracts\DealPercentageRepository;
use Src\Domain\Deal\Entities\DealPercentage;
use Src\Infrastructure\AbstractRepositories\EloquentRepository;

/**
 * Class DealPercentageRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DealPercentageRepositoryEloquent extends EloquentRepository implements DealPercentageRepository
{

    /**
     * Specify Fields
     *
     * @return string
     */
    protected $allowedFields = [
        ###allowedFields###
    	###\allowedFields###
    ];

    /**
     * Include Relationships
     *
     * @return string
     */
    protected $allowedIncludes = [
        ###allowedIncludes###
    	###\allowedIncludes###
    ];

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return DealPercentage::class;
    }

    /**
     * Specify Model Relationships
     *
     * @return string
     */
    public function relations()
    {
        return [
            ###allowedRelations###
            ###\allowedRelations###
        ];
    }
}
