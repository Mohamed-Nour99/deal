<?php

namespace Src\Domain\Deal\Repositories\Eloquent;

use Src\Domain\Deal\Repositories\Contracts\DealRepository;
use Src\Domain\Deal\Entities\Deal;
use Src\Infrastructure\AbstractRepositories\EloquentRepository;

/**
 * Class DealRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class DealRepositoryEloquent extends EloquentRepository implements DealRepository
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
        return Deal::class;
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
