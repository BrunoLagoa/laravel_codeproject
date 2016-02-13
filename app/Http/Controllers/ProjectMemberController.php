<?php
namespace CodeProject\Http\Controllers;

use CodeProject\Repositories\ProjectMemberRepository;
use CodeProject\Services\ProjectMemberService;
use Illuminate\Http\Request;

class ProjectMemberController extends Controller
{
    /**
     * @var ProjectMemberRepository
     */
    private $repository;
    /**
     * @var ProjectMemberService
     */
    private $service;

    /**
     * @param ProjectMemberRepository $repository
     * @param ProjectMemberService $service
     */
    public function __construct(ProjectMemberRepository $repository, ProjectMemberService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
        $this->middleware('check.project.owner', ['except' => ['index', 'show']]);
        $this->middleware('check.project.permission', ['except' => ['store', 'destroy']]);
    }

    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]);
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();
        $data['project_id'] = $id;
        return $this->repository->create($data);
    }

    public function show($id, $idProjectMember)
    {
        return $this->repository->find($idProjectMember);
    }

    public function destroy($id, $idProjectMember)
    {
        $this->service->delete($idProjectMember);
    }
    /*
        public function members($id)
        {
            //return $this->repository->findWhere(['project_id' => $id, 'id' => $noteId]);
            //return $this->repository->find($id);
            //return $this->repository->with(['members'])->find($id);
            return $this->repository->with(['user'])->findWhere(['project_id' => $id]);
        }
    */
}