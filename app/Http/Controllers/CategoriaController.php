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
    private $repoitory;

    public function  __construct(CategoryRepository $repo)
    {
        $this->middleware('auth');
        $this->repoitory = $repo;
    }

    public function getAll(Request $request)
    {
        $categorias = Categoria::orderBy('id','ASC')->paginate(5);
        if ($request->ajax() ) {
            $returnHTML = view('layouts.admin.categoria.index')
                            ->with('categoryModel',$categorias)
                            ->render();
            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }
        //return view('layouts.admin.categoria.index')->with('categoryModel',$categorias);
    }

    public function get($id)
    {
        $categorias = $this->repoitory->find($id);
        return response()->json(array('success' => true, 'data'=>$categorias));
    }

    public  function addOrUpdate(Request $request)
    {
        if($request->ajax()){
            $id = $request->data['id'];
            $isNew = $this->repoitory->find($id);
            if($isNew == null){
                $cat = new Categoria();
                $cat->descripcion = $request->data['descripcion'];
                $cat->save();
                return response()->json(["mensaje" => "Creado"]);
            }
            $this->repoitory->update($request->data,$id);
            return response()->json(["mensaje" => "Actualizado"]);
        }
    }

    public  function delete($id)
    {
        $this->repoitory->delete($id);
        return response()->json(["mensaje"=>"Borrado"]);
    }
}


