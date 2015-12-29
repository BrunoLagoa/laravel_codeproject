<?php

namespace CodeProject\Http\Controllers;

use CodeProject\Entities\ProjectFileRepository;
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
     * @return Response
     */
    public function store(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
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
        return response()->download($this->service->getFilePath($id));
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
        if($this->service->checkProjectPermissions($id) == false){
            return ['error' => 'Access Forbidden'];
        }
        return $this->service->update($request->all(), $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @param $filetId
     * @return Response
     */
    public function destroy($id, $fileId)
    {
        try{
            if($this->service->checkProjectPermissions($id) == false){
                return ['error' => 'Access Forbidden'];
            }

            $projectFile = ProjectFile::find($fileId);
            //dd($projectFile);
            if($projectFile == null)
            {
                return [
                    'error' => true,
                    'message' => 'File not found'
                ];
            }

            if(file_exists(storage_path().'\app\\'.$projectFile->id.'.'.$projectFile->extension))
            {
                Storage::disk('local')->delete($projectFile->id.'.'.$projectFile->extension);
            }

            $projectFile->delete();

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
