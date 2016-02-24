<?php

namespace CodeProject\Services;

use CodeProject\Repositories\ClientRepository;
use CodeProject\Validators\ClientValidator;

class ClientService
{

    /**
     * @var ClientRepository
     */
    protected $repository;

    /**
     * @var ClientValidator
     */
    private $validator;

    public function __construct(ClientRepository $repository, ClientValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function create(array $data)
    {

        $this->validator->with($data)->passesOrFail();
        return $this->repository->create($data);

        //enviar email
        //dispara notificacao
    }

    public function update(array $data, $id)
    {
        $this->validator->with($data)->passesOrFail();
        return $this->repository->update($data, $id);
    }
}