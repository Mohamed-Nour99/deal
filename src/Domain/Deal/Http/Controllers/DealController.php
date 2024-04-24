<?php

namespace Src\Domain\Deal\Http\Controllers;

use Src\Infrastructure\Http\AbstractControllers\BaseController as Controller;
use Src\Domain\Deal\Http\Requests\Deal\DealStoreFormRequest;
use Src\Domain\Deal\Http\Requests\Deal\DealUpdateFormRequest;
use Src\Domain\Deal\Repositories\Contracts\DealRepository;
use Illuminate\Http\Request;
use theaddresstech\DDD\Traits\Responder;
use Src\Domain\Deal\Entities\Deal;
use Src\Domain\Deal\Http\Resources\Deal\DealResourceCollection;
use Src\Domain\Deal\Http\Resources\Deal\DealResource;

class DealController extends Controller
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
    protected $viewPath = 'deal';

    /**
     * Resource Route.
     *
     * @var string
     */
    protected $resourceRoute = 'deals';

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
    public function index(Request $request)
    {
        $index = $this->dealRepository->spatie()->paginate();

        $this->setData('title', __('main.show-all') . ' ' . __('main.deal'));

        $this->setData('alias', $this->domainAlias);

        $this->setData('data', $index);

        $this->useCollection(DealResourceCollection::class,'data');

        return $this->response();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->setData('title', __('main.add') . ' ' . __('main.deal'), 'web');

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
    public function store(DealStoreFormRequest $request)
    {
        $store = $this->dealRepository->create($request->validated());

        if($store){
            $this->setData('data', $store);

            $this->redirectRoute("{$this->resourceRoute}.show",[$store->id]);
            $this->useCollection(DealResource::class, 'data');
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
    public function show(Deal $deal)
    {
        $this->setData('title', __('main.show') . ' ' . __('main.deal') . ' : ' . $deal->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('show', $deal);

        $this->useCollection(DealResource::class,'show');

        return $this->response();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        $this->setData('title', __('main.edit') . ' ' . __('main.deal') . ' : ' . $deal->id, 'web');

        $this->setData('alias', $this->domainAlias,'web');

        $this->setData('edit', $deal);

        $this->useCollection(DealResource::class,'edit');

        return $this->response();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DealUpdateFormRequest $request, $deal)
    {
        $update = $this->dealRepository->update($request->validated(), $deal);

        if($update){
            $this->redirectRoute("{$this->resourceRoute}.show",[$update->id]);
            $this->setData('data', $update);
            $this->useCollection(DealResource::class, 'data');
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

        $delete = $this->dealRepository->destroy($ids);

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
