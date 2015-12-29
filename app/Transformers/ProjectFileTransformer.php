<?php

namespace CodeProject\Transformers;

use CodeProject\Entities\ProjectFile;
use League\Fractal\TransformerAbstract;

/**
 * Class ProjectTransformer
 * @package namespace CodeProject\Transformers;
 */
class ProjectFileTransformer extends TransformerAbstract
{
    /**
     * Transform the \Project entity
     * @param ProjectFile $projectFile
     * @return array
     * @internal param ProjectNote $project
     * @internal param \Project $model
     */
    public function transform(ProjectFile $projectFile)
    {
        return [
            'id' => $projectFile->id,
            'name' => $projectFile->name,
            'extension' => $projectFile->extension,
            'description' => $projectFile->description,
            'created_at' => date_format($projectFile->created_at, "Y-m-d h:m:s"),
            'updated_at' => date_format($projectFile->created_at, "Y-m-d h:m:s"),
        ];
    }

}
