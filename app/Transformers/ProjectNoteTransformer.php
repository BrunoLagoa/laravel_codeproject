<?php

namespace CodeProject\Transformers;

use CodeProject\Entities\ProjectNote;
use League\Fractal\TransformerAbstract;

/**
 * Class ProjectTransformer
 * @package namespace CodeProject\Transformers;
 */
class ProjectNoteTransformer extends TransformerAbstract
{
    /**
     * Transform the \Project entity
     * @param ProjectNote $projectNote
     * @return array
     * @internal param ProjectNote $project
     * @internal param \Project $model
     */
    public function transform(ProjectNote $projectNote)
    {
        return [
            'id' => $projectNote->id,
            'project_id' => $projectNote->project_id,
            'title' => $projectNote->title,
            'note' => $projectNote->note,
            'created_at' => date_format($projectNote->created_at, "Y-m-d h:m:s"),
            'updated_at' => date_format($projectNote->created_at, "Y-m-d h:m:s"),
        ];
    }

}
