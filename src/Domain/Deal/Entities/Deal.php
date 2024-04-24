<?php

namespace Src\Domain\Deal\Entities;

use Illuminate\Support\Facades\DB;
use Src\Infrastructure\AbstractModels\BaseModel as Model;
use Src\Domain\Deal\Entities\Traits\Relations\DealRelations;
use Src\Domain\Deal\Entities\Traits\CustomAttributes\DealAttributes;
use Src\Domain\Deal\Repositories\Contracts\DealRepository;

class Deal extends Model
{
    use DealRelations, DealAttributes;

    /**
     * @var array
     */
    public static $logAttributes = ["*"];

    /**
     * The attributes that are going to be logged.
     *
     * @var array
     */
    protected static $logName = 'Deal';

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
        'deal',
        'code'
    ];

    /**
     * The table name.
     *
     * @var array
     */
    protected $table = "deals";

    /**
     * Holds Repository Related to current Model.
     *
     * @var array
     */
    protected $routeRepoBinding = DealRepository::class;

  

    public function scopeWithHighestPercentage($query)
    {
        return $query->with(['dealPercentages' => function ($query) {
            $query->select('deal_id', 'agent_id', DB::raw('MAX(deal_percentage) as max_percentage'))
                ->groupBy('agent_id');
        }])
        ->select('id')
        ->withCount(['dealPercentages as total_max_percentage' => function ($query) {
            $query->select(DB::raw('SUM(max_percentage)'));
        }]);
    }
}
