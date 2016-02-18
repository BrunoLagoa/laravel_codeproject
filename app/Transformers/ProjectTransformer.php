<?php

namespace CodeProject\Transformers;

use CodeProject\Entities\Project;
use League\Fractal\TransformerAbstract;

/**
 * Class ProjectTransformer
 * @package namespace CodeProject\Transformers;
 */
class ProjectTransformer extends TransformerAbstract
{
    protected $defaultIncludes = ['members', 'notes', 'tasks', 'files', 'client'];

    public function transform(Project $project)
    {
        return [
            'id' => $project->id,
            'client_id' => $project->client_id,
            'owner_id' => $project->owner_id,
            'name' => $project->name,
            'description' => $project->description,
            'progress' => (int)$project->progress,
            'status' => $project->status,
            'due_date' => $project->due_date,
            'is_member' => $project->owner_id != \Authorizer::getResourceOwnerId(),
            'tasks_count' => $project->tasks->count(),
            'tasks_opened' => $this->countTasksOpened($project)
        ];
    }

    public function includeMembers(Project $project)
    {
        return $this->collection($project->members, new MemberTransformer());
    }

    public function includeClient(Project $project)
    {
        return $this->item($project->client, new ClientTransformer());
    }

    public function includeTasks(Project $project)
    {
        return $this->collection($project->tasks, new ProjectTaskTransformer());
    }

    public function includeNotes(Project $project)
    {
        return $this->collection($project->notes, new ProjectNoteTransformer());
    }

    public function includeFiles(Project $project)
    {
        return $this->collection($project->files, new ProjectFileTransformer());
    }

    private function countTasksOpened(Project $project)
    {
        $count = 0;
        foreach ($project->tasks as $task) {
            if ($task->status == 1)
                $count++;
        }
        return $count;
    }
}
