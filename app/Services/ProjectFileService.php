<?php
namespace CodeProject\Services;

use CodeProject\Repositories\ProjectFileRepository;
use CodeProject\Repositories\ProjectRepository;
use CodeProject\Validators\ProjectFileValidator;
use Prettus\Validator\Exceptions\ValidatorException;
use Illuminate\Contracts\Filesystem\Factory as Storage;
use Illuminate\Filesystem\Filesystem;
use Prettus\Validator\Contracts\ValidatorInterface;

class ProjectFileService
{
    /**
     * @var ProjectFileRepository
     */
    protected $repository;
    /**
     * @var ProjectRepository
     */
    protected $projectRepository;
    /**
     * @var ProjectFileValidator
     */
    protected $validator;
    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var Storage
     */
    private $storage;
    /**
     * @var ProjectFileValidator
     */
    protected $validatorProjectFile;

    public function __construct(ProjectFileRepository $repository,
                                ProjectRepository $projectRepository,
                                ProjectFileValidator $validator,
                                Filesystem $filesystem,
                                Storage $storage)
    {
        $this->repository = $repository;
        $this->projectRepository = $projectRepository;
        $this->validator = $validator;
        $this->filesystem = $filesystem;
        $this->storage = $storage;
    }

    public function create(array $data)
    {
        // diversos serviços
        // enviar email
        // disparar notificacao
        try {
            //dd($data);
            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_CREATE);
            $project = $this->projectRepository->skipPresenter()->find($data['project_id']);
            $projectFile = $project->files()->create($data);
            $this->storage->put($projectFile->getFileName(), $this->filesystem->get($data['file']));
            return $projectFile;
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

            $this->validator->with($data)->passesOrFail(ValidatorInterface::RULE_UPDATE);
            return $this->repository->update($data, $id);
        } catch (ValidatorException $e) {
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    public function getFilePath($id)
    {
        $projectFile = $this->repository->skipPresenter()->find($id);
        return $this->getBaseUrl($projectFile);
    }

    public function getFileName($id)
    {
        $projectFile = $this->repository->skipPresenter()->find($id);
        return $projectFile->getFileName();
    }

    private function getBaseUrl($projectFile)
    {
        switch ($this->storage->getDefaultDriver()) {
            case 'local':
                return $this->storage->getDriver()->getAdapter()->getPathPrefix()
                . '/' . $projectFile->getFileName();
                break;
        }
    }

    public function delete($id)
    {
        $projectFile = $this->repository->skipPresenter()->find($id);
        if ($this->storage->exists($projectFile->getFileName())) {
            $this->storage->delete($projectFile->getFileName());
            return $projectFile->delete();
        }
        /*
        // recupera somente os Files
        $files = $this->repository->skipPresenter()->find($projectId)->files;
        //dd($files);
        $deletar = [];
        foreach ($files as $file) {
            $path = $file->id . '.' . $file->extension;
            // deletar da bd
            if($file->delete($file->id))
                $deletar[] = $path;
        }
        //dd($deletar);
        $r = $this->storage->delete($deletar);
        if($r)
            return ['error' => false];
        else
            return ['error' => true];
        */
    }

    /* // 17/10/2015 - Removido. Agora middleware Project é responsável pela verificação.
    public function checkProjectOwner($projectFileId)
    {
        $userId = \Authorizer::getResourceOwnerId();
        $projectId = $this->repository->skipPresenter()->find($projectFileId)->project_id;
        return $this->projectRepository->isOwner($projectId, $userId);
    }
    public function checkProjectMember($projectFileId)
    {

        $userId = \Authorizer::getResourceOwnerId();
        $projectId = $this->repository->skipPresenter()->find($projectFileId)->project_id;
        return $this->projectRepository->hasMember($projectId, $userId);
    }
    public function checkProjectPermissions($projectFileId){

        if($this->checkProjectOwner($projectFileId) or $this->checkProjectMember($projectFileId)){
            return true;
        }
        return false;
    }
    */
}