<?php

namespace CodeProject\Http\Middleware;

use Closure;
use CodeProject\Services\ProjectService;

class CheckProjectPermission
{
    /**
     * @var ProjectService
     */
    private $service;

    /**
     * @param ProjectService $service
     */
    public function __construct(ProjectService $service)
    {
        $this->service = $service;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $projectId = $request->route('id');
        if($this->service->checkProjectPermissions($projectId) == false){
            return ['error' => 'You haven\'t permission to access project'];
        }
        return $next($request);
    }
}
