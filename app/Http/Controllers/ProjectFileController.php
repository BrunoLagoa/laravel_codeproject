<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Entities\ProjectFile;
use CodeProject\Repositories\ProjectFileRepository;
use CodeProject\Services\ProjectFileService;
use CodeProject\Http\Requests;
use CodeProject\Repositories\ProjectRepository;
use CodeProject\Services\ProjectService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use LucaDegasperi\OAuth2Server\Facades\Authorizer;
use Prettus\Validator\Exceptions\ValidatorException;

class ProjectFileController extends Controller
{
    /**
     * @var ProjectFileRepository
     */
    private $repository;

    /**
     * @var ProjectFileService
     */
    private $service;

    /**
     * @param ProjectFileRepository $repository
     * @param ProjectFileService $service
     */
    public function __construct(ProjectFileRepository $repository, ProjectFileService $service)
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
    public function store(Request $request,$id)
    {
        try {
            $data = $request->all();
            $data['project_id'] = $id;
            $validator = Validator::make($data, [
                'file'=> 'required'
            ]);

            if($validator->fails()) {
                return [
                    'error' => true,
                    'message' => 'Unselected file'
                ];
            }

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();

            $data['file'] = $file;
            $data['extension'] = $extension;
            $data['name'] = $request->name;
            $data['project_id'] = $request->project_id;
            $data['description'] = $request->description;

            return $this->service->create($data);
        } catch(ModelNotFoundException $ex) {
            return [
                'error' => true,
                'message' => 'Error store file'
            ];
        }
    }

    public function showFile($id)
    {
        if($this->service->checkProjectPermissions($id) == false){
            return ['error' => 'Access Forbidden'];
        }
        $filePath = $this->service->getFilePath($id);
        $fileContent = file_get_contents($filePath);
        $file64 = base64_encode($fileContent);
        return [
            'file' => $file64,
            'size' => filesize($filePath),
            'name' => $this->service->getFileName($id)
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        if($this->service->checkProjectPermissions($id) == false){
            return ['error' => 'Access Forbidden'];
        }
        return $this->repository->find($id);
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
        $data = $request->all();
        $data['project_id'] = $id;

        if($this->service->checkProjectPermissions($id) == false){
            return ['error' => 'Access Forbidden'];
        }
        return $this->service->update($data, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param $filetId
     * @return Response
     */
    public function destroy($id)
    {
        try{
            if($this->service->checkProjectPermissions($id) == false){
                return ['error' => 'Access Forbidden'];
            }

            $this->service->delete($id);

            return [
                'error' => false,
                'message' => 'Store file deleted'
            ];
        } catch(ModelNotFoundException $ex) {
            return [
                'error' => true,
                'message' => 'Store file error'
            ];
        }

    }
}
