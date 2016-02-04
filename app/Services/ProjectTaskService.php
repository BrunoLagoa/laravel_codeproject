<?php

namespace CodeProject\Services;


use CodeProject\Repositories\ProjectRepository;
use CodeProject\Repositories\ProjectTaskRepository;
use CodeProject\Validators\ProjectTaskValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectTaskService
{

    /**
     * @var ProjectTaskRepository
     */
    private $repository;
    /**
     * @var ProjectTaskValidator
     */
    private $validator;
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    /**
     * @param ProjectTaskRepository $repository
     * @param ProjectRepository $projectRepository
     * @param ProjectTaskValidator $validator
     */
    public function __construct(ProjectTaskRepository $repository,
                                ProjectRepository $projectRepository,
                                ProjectTaskValidator $validator)
    {

        $this->repository = $repository;
        $this->projectRepository = $projectRepository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {
        try {
            $this->validator->with($data)->passesOrFail();

            $project = $this->projectRepository->skipPresenter()->find($data['project_id']);
            $projectTask = $project->tasks()->create($data);
            return $projectTask;
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function update(array $data, $id)
    {
        try {
            $this->validator->with($data)->passesOrFail();
            return $this->repository->update($data, $id);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function delete($id)
    {
        $projectTask = $this->repository->skipPresenter()->find($id);
        return $projectTask->delete();
    }

    public function all()
    {
        return $this->repository->with(['owner', 'client'])->all();
    }

    public function find($id)
    {
        return $this->repository->with(['owner', 'client'])->find($id);
    }
}