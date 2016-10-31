<?php

namespace App\Repositories;

use App\Repositories\Base\RepositoryBase;

class ArticleRepository extends RepositoryBase
{
    function model()
    {
        return 'App\Articulo';
    }
}