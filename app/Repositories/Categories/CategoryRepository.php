<?php

namespace App\Repositories\Categories;

use App\Repositories\Base\RepositoryBase;

class CategoryRepository extends RepositoryBase
{
    function model()
    {
        return 'App\Categoria';
    }
}