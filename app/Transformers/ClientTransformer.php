<?php

namespace CodeProject\Transformers;

use CodeProject\Entities\Client;
use League\Fractal\TransformerAbstract;

/**
 * Class ProjectTransformer
 * @package namespace CodeProject\Transformers;
 */
class ClientTransformer extends TransformerAbstract
{
    /**
     * Transform the \Project entity
     * @param Client $client
     * @return array
     * @internal param ProjectNote $projectNote
     * @internal param ProjectNote $project
     * @internal param \Project $model
     */
    public function transform(Client $client)
    {
        return [
            'id' => $client->id,
            'name' => $client->name,
            'responsible' => $client->responsible,
            'email' => $client->email,
            'phone' => $client->phone,
            'address' => $client->address,
            'obs' => $client->obs,
            'created_at' => date_format($client->created_at, "Y-m-d h:m:s"),
            'updated_at' => date_format($client->created_at, "Y-m-d h:m:s"),
        ];
    }

}
