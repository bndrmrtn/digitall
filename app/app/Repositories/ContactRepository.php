<?php

namespace App\Repositories;


use A17\Twill\Repositories\ModuleRepository;
use App\Models\Contact;

class ContactRepository extends ModuleRepository
{
    

    public function __construct(Contact $model)
    {
        $this->model = $model;
    }
}
