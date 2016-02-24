<?php

namespace CodeProject\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Prettus\Validator\Exceptions\ValidatorException;
use CodeProject\Repositories\ClientRepository;
use CodeProject\Services\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $repository;

    /**
     * @var ClientService
     */
    private $service;

    /**
     * @param ClientRepository $repository
     * @param ClientService $service
     */
    public function __construct(ClientRepository $repository, ClientService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $limit = $request->query->get('limit',15);
        return $this->repository->paginate($limit);
        //return $this->repository->skipPresenter()->all();
        //return $this->repository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        try{
            return $this->service->create($request->all());
        } catch (ValidatorException $e) {
            Response::json([
                'error' => true,
                'message' => $e->getMessageBag()
            ],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        return $this->repository->skipPresenter()->find($id);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        try{
            return $this->service->update($request->all(), $id);
            //$this->repository->find($id)->update($request->all());
        } catch (ValidatorException $e) {
            Response::json([
                'error' => true,
                'message' => $e->getMessageBag()
            ],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->repository->skipPresenter()->find($id)->delete();
        // $this->repository->delete($id);
        return response("",404);
    }
}
