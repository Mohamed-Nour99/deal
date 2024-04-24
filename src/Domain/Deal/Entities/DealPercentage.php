<?php

namespace Src\Domain\Deal\Entities;

use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Deal\Entities\Traits\Relations\DealPercentageRelations;
use Src\Domain\Deal\Entities\Traits\CustomAttributes\DealPercentageAttributes;
use Src\Domain\Deal\Repositories\Contracts\DealPercentageRepository;

class DealPercentage extends Model
{
    use DealPercentageRelations, DealPercentageAttributes;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'DealPercentage';

    /**
     * define belongsTo relations.
     *
     * @var array
     */
    private $belongsTo = [];

    /**
     * define hasMany relations.
     *
     * @var array
     */
    private $hasMany = [];

    /**
     * define belongsToMany relations.
     *
     * @var array
     */
    private $belongsToMany = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'deal_percentage',
        'agent_id',
        'deal_id',
        'type'
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "deal_percentages";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = DealPercentageRepository::class;
}
