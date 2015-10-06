<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Http\Requests;
use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $repository;

    /**
     * @var ProjectService
     */
    private $service;

    /**
     * @param ProjectRepository $repository
     * @param ProjectService $service
     */
    public function __construct(ProjectRepository $repository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return $this->service->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        try {
            $project = $this->service->find($id);
            return $project;
        }catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => 'Project not found'
            ];
        }

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
        return $this->service->update($request->all(), $id);
        //$this->repository->find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->repository->find($id)->delete();
    }

    /**
     * @param $id
     * @return Response
     */
    public function showMembers($id)
    {
        return $this->service->showMembers($id);
    }

    /**
     * @param $id
     * @param $memberId
     * @return Response
     */
    public function addMember($id, $memberId)
    {
        return $this->service->addMember($id, $memberId);
    }
    /**
     * @param $id
     * @param $memberId
     * @return Response
     */
    public function removeMember($id, $memberId)
    {
        return $this->service->removeMember($id, $memberId);
    }
    /**
     * @param $id
     * @param $memberId
     * @return Response
     */
    public function isMember($id, $memberId)
    {
        return $this->service->isMember($id, $memberId);
    }
}
