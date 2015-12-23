<?php

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

class ProjectValidator extends LaravelValidator
{
    protected $rules = [
        'owner_id'  => 'required|integer',
        'client_id' => 'required|integer|exists:clients,id',
        'name'      => 'required|max:255',
        'progress'  => 'required|integer',
        'status'    => 'required|integer',
        'due_date'  => 'required'
    ];
}