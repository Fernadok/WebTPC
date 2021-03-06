<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Repositories\CategoryRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

use App\Http\Requests;
use PDOException;

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
        $categorias = Categoria::orderBy('id','ASC')->paginate(10);
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

    public function addOrUpdate(Request $request)
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

    public function delete($id)
    {
        $this->repoitory->find($id)->delete();
        return response()->json(["mensaje"=>"Borrado"]);
    }

    public function categoriasCombo()
    {
        $categoriasCombo = $this->repoitory->all(['id','descripcion']);
        return response()->json(array('success' => true, 'data'=>$categoriasCombo));
    }
}


