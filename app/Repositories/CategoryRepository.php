<?php

namespace App\Repositories;

use App\Repositories\Base\RepositoryBase;

class CategoryRepository extends RepositoryBase
{
    function model()
    {
        return 'App\Categoria';
    }
}