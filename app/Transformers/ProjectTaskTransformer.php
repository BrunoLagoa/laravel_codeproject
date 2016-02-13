<?php

namespace CodeProject\Transformers;

use CodeProject\Entities\ProjectNote;
use CodeProject\Entities\ProjectTask;
use League\Fractal\TransformerAbstract;

/**
 * Class ProjectTransformer
 * @package namespace CodeProject\Transformers;
 */
class ProjectTaskTransformer extends TransformerAbstract
{
    /**
     * Transform the \Project entity
     * @param ProjectTask $projectTask
     * @return array
     * @internal param ProjectNote $projectNote
     * @internal param ProjectNote $project
     * @internal param \Project $model
     */
    public function transform(ProjectTask $projectTask)
    {
        return [
            'id' => $projectTask->id,
            'name' => $projectTask->name,
            'project_id' => $projectTask->project_id,
            'start_date' => $projectTask->start_date,
            'due_date' => $projectTask->due_date,
            'status' => $projectTask->status
            //'created_at' => date_format($projectTask->created_at, "Y-m-d h:m:s"),
            //'updated_at' => date_format($projectTask->created_at, "Y-m-d h:m:s"),
        ];
    }

}
