<?php

namespace CodeProject\Transformers;

use CodeProject\Entities\User;
use League\Fractal\TransformerAbstract;

/**
 * Class ProjectTransformer
 * @package namespace CodeProject\Transformers;
 */
class ProjectMemberTransformer extends TransformerAbstract
{

    /**
     * Transform the \Project entity
     * @param User $member
     * @return array
     * @internal param \Project $model
     *
     */
    public function transform(User $member)
    {
        return [
            'member_id' => $member->id,
            'name' => $member->name,
        ];
    }
}
