<?php

namespace CodeProject\Validators;


use Prettus\Validator\LaravelValidator;

class ProjectFileNoteValidator extends LaravelValidator
{
    protected $rules = [
        'project_id'  => 'required|integer',
        'title' => 'required',
        'note' => 'required',
    ];
}