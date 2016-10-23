<?php

namespace App\Http\Controllers;

use App\Repositories\Categories\CategoryRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class CategoriaController extends Controller
{
    /**
     * @var IBaseRepository
     */
    private $repo;

    public function  __construct(CategoryRepository $repo)
    {
        $this->repo = $repo;
    }

    public function getAll()
    {
        $categorias = $this->repo->all();
        return $categorias;
    }
}
