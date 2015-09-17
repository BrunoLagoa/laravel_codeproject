<?php

namespace CodeProject\Services;


use CodeProject\Repositories\ClientRepository;

class ClientService
{
    protected $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data)
    {
        // Enviar um email
        // Disparar notificação
        // Disparar um tweet
        return $this->repository->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->repository->update($data, $id);
    }

}