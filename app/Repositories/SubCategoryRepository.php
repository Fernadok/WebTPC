<?php
/**
 * Created by PhpStorm.
 * User: Fernadok
 * Date: 28/10/2016
 * Time: 14:03
 */

namespace App\Repositories;


use App\Repositories\Base\RepositoryBase;

class SubCategoryRepository extends RepositoryBase
{
    function model()
    {
        return 'App\Subcategoria';
    }
}