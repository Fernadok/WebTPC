<?php

namespace App\Repositories;

use App\Repositories\Base\RepositoryBase;

class RolRepository extends RepositoryBase
{
    function model()
    {
        return 'App\Rol';
    }
}