<?php

namespace App\Repositories;

use App\Repositories\Base\RepositoryBase;

class UserRepository extends RepositoryBase
{
    function model()
    {
        return 'App\User';
    }
}