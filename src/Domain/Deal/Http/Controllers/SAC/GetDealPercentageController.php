<?php

namespace Src\Domain\Deal\Http\Controllers\SAC;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Deal\Repositories\Contracts\DealRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Src\Domain\Deal\Entities\Deal;
use Src\Domain\Deal\Entities\DealPercentage;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Deal\Http\Resources\Dealpercentage\DealpercentageResourceCollection;
use Src\Domain\Deal\Http\Resources\Dealpercentage\DealpercentageResource;

class GetDealPercentageController extends Controller
{
    use Responder;

    /**
     * @var DealRepository
     */
    protected $dealRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'get_deal_percentage';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'get_deal_percentages';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'deals';


    /**
     * @param DealRepository $dealRepository
     */
    public function __construct(DealRepository $dealRepository)
    {
        $this->dealRepository = $dealRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $highestPercentages = DealPercentage::select('deal_id' , 'agent_id', DB::raw('MAX(deal_percentage) as highest_percentage'))
        ->groupBy('deal_id' ,'agent_id')
        ->get();
    
    $totalSum = $highestPercentages->sum('highest_percentage');

    $info = [
       'info' => $highestPercentages,
        'sum of percentage'=>$totalSum 

    ];
    
    return  $info;

    }
}
