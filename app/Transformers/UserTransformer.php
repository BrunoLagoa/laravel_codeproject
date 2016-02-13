<?php

namespace CodeProject\Transformers;

use League\Fractal\TransformerAbstract;
use CodeProject\Entities\User;

/**
 * Class UserTransformer
 * @package namespace CodeProject\Transformers;
 */
class UserTransformer extends TransformerAbstract
{

    /**
     * @param User|\CodeProject\Transformers\User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            //'password' => $data->password,
            'remember_token' => $user->remember_token,
        ];
    }
}