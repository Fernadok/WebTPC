<?php

namespace App\Http\Controllers;

use App\Categoria;
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

    public function index(Request $request)
    {
      //  $categorias = $this->repo->all();

      //  return $categorias;

       // $user = User::orderBy('id','ASC')->paginate(3);
        $categorias = Categoria::orderBy('id','ASC')->paginate(5);
        if ($request->ajax() ) {
            $returnHTML = view('layouts.admin.categoria.index')
                            ->with('categoryModel',$categorias)
                            ->render();
            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }
        return view('layouts.admin.categoria.index')->with('categoryModel',$categorias);

    }
}
