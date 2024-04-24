<?php

namespace Src\Domain\Deal\Http\Controllers;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Deal\Http\Requests\DealPercentage\DealPercentageStoreFormRequest;
use Src\Domain\Deal\Http\Requests\DealPercentage\DealPercentageUpdateFormRequest;
use Src\Domain\Deal\Repositories\Contracts\DealPercentageRepository;
use Illuminate\Http\Request;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Deal\Entities\DealPercentage;
use Src\Domain\Deal\Http\Resources\DealPercentage\DealPercentageResourceCollection;
use Src\Domain\Deal\Http\Resources\DealPercentage\DealPercentageResource;

class DealPercentageController extends Controller
{
    use Responder;

    /**
     * @var DealPercentageRepository
     */
    protected $dealPercentageRepository;

    /**
     * View Path
     *
     * @var string
     */
    protected $viewPath = 'deal_percentage';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'deal_percentages';

    /**
     * Domain Alias.
     *
     * @var string
     */
    protected $domainAlias = 'deals';


    /**
     * @param DealPercentageRepository $dealPercentageRepository
     */
    public function __construct(DealPercentageRepository $dealPercentageRepository)
    {
        $this->dealPercentageRepository = $dealPercentageRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $index = $this->dealPercentageRepository->spatie()->paginate();

        $this->setData('title', __('main.show-all') . ' ' . __('main.deal_percentage'));

        $this->setData('alias', $this->domainAlias);

        $this->setData('data', $index);

        $this->useCollection(DealPercentageResourceCollection::class,'data');

        return $this->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData('title', __('main.add') . ' ' . __('main.deal_percentage'), 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setApiResponse(fn()=> response()->json(['create_your_own_form'=>true]));

        return $this->response();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DealPercentageStoreFormRequest $request)
    {
        $store = $this->dealPercentageRepository->create($request->validated());

        if($store){
            $this->setData('data', $store);

            $this->redirectRoute("{$this->resourceRoute}.show",[$store->id]);
            $this->useCollection(DealPercentageResource::class, 'data');
        }else{
            $this->redirectBack();
            $this->setApiResponse(fn()=> response()->json(['created'=>false]));
        }

        return $this->response();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(DealPercentage $deal_percentage)
    {
        $this->setData('title', __('main.show') . ' ' . __('main.deal_percentage') . ' : ' . $deal_percentage->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('show', $deal_percentage);

        $this->useCollection(DealPercentageResource::class,'show');

        return $this->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(DealPercentage $deal_percentage)
    {
        $this->setData('title', __('main.edit') . ' ' . __('main.deal_percentage') . ' : ' . $deal_percentage->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('edit', $deal_percentage);

        $this->useCollection(DealPercentageResource::class,'edit');

        return $this->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DealPercentageUpdateFormRequest $request, $deal_percentage)
    {
        $update = $this->dealPercentageRepository->update($request->validated(), $deal_percentage);

        if($update){
            $this->redirectRoute("{$this->resourceRoute}.show",[$update->id]);
            $this->setData('data', $update);
            $this->useCollection(DealPercentageResource::class, 'data');
        }else{
            $this->redirectBack();
            $this->setApiResponse(fn()=>response()->json(['updated'=>false],422));
        }

        return $this->response();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ids = request()->get('ids',[$id]);

        $delete = $this->dealPercentageRepository->destroy($ids);

        if($delete){
            $this->redirectRoute("{$this->resourceRoute}.index");
            $this->setApiResponse(fn()=>response()->json(['deleted'=>true],200));
        }else{
            $this->redirectBack();
            $this->setApiResponse(fn()=>response()->json(['updated'=>false],422));
        }

        return $this->response();
    }

}
