<?php

namespace CodeProject\Transformers;

use League\Fractal\TransformerAbstract;
use CodeProject\Entities\Project;

/**
 * Class ProjectTransformer
 * @package namespace CodeProject\Transformers;
 */
class ProjectTransformer extends TransformerAbstract
{

    /**
     * Transform the \Project entity
     * @param \Project $model
     *
     * @return array
     */
    public function transform(Project $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
