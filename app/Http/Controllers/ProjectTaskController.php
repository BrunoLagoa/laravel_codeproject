<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Http\Requests;
use CodeProject\Repositories\ProjectTaskRepository;
use CodeProject\Services\ProjectTaskService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProjectTaskController extends Controller
{
    /**
     * @var ProjectTaskRepository
     */
    private $repository;

    /**
     * @var ProjectTaskService
     */
    private $service;

    /**
     * @param ProjectTaskRepository $repository
     * @param ProjectTaskService $service
     */
    public function __construct(ProjectTaskRepository $repository, ProjectTaskService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @param $id
     * @return Response
     */
    public function store(Request $request, $id)
    {
        $data = $request->all();
        $data['project_id'] = $id;
        return $this->service->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @param $taskId
     * @return Response
     */
    public function show($id, $taskId)
    {
        try {
            //$project = $this->repository->findWhere(['project_id' => $id, 'id' => $taskId]);
            $project =  $this->repository->find($taskId);
            return $project;
        }catch (ModelNotFoundException $e) {
            return [
                'error' => true,
                'message' => 'ProjectNote not found'
            ];
        }

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  int $id
     * @param $taskId
     * @return Response
     */
    public function update(Request $request, $id, $taskId)
    {
        $data = $request->all();
        $data['project_id'] = $id;
        return $this->service->update($data, $taskId);
        //$this->repository->find($id)->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param $idTask
     * @return Response
     */
    public function destroy($id, $idTask)
    {
        $this->service->delete($idTask);
        //$this->repository->find($idTask)->delete();
    }
}
