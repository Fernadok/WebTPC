<?php

namespace App\Http\Controllers;

use App\Repositories\SubCategoryRepository;
use App\Subcategoria;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubCategoriaController extends Controller
{
    /**
     * @var IBaseRepository
     */
    private $repoitory;

    public function  __construct(SubCategoryRepository $repo)
    {
        $this->middleware('auth');
        $this->repoitory = $repo;
    }

    public function getAll(Request $request)
    {

        $Subcategorias = SubCategoria::orderBy('id','ASC')->paginate(10);
        if ($request->ajax() ) {
            $returnHTML = view('layouts.admin.subCategoria.index')
                ->with('subcategoryModel',$Subcategorias)
                ->render();
            return response()->json(array('success' => true, 'html'=>$returnHTML));
        }
        //return view('layouts.admin.subCategoria.index')->with('subcategoryModel',$Subcategorias);
    }

    public function get($id)
    {
        $subcategorias = $this->repoitory->find($id);
        return response()->json(array('success' => true, 'data'=>$subcategorias));
    }

    public  function addOrUpdate(Request $request)
    {
        if($request->ajax()){
            $id = $request->data['id'];
            $isNew = $this->repoitory->find($id);
            if($isNew == null){
                $cat = new Subcategoria();
                $cat->descripcion = $request->data['descripcion'];
                $cat->categoria_id = $request->data['categoria_id'];
                $cat->save();
                return response()->json(["mensaje" => "Creado"]);
            }
            $this->repoitory->update($request->data,$id);
            return response()->json(["mensaje" => "Actualizado"]);
        }
    }

    public  function delete($id)
    {
        $this->repoitory->find($id)->delete();
        return response()->json(["mensaje"=>"Borrado"]);
    }

    public function subcategoriasCombo()
    {
        $subcategoriasCombo = $this->repoitory->all(['id','descripcion']);
        return response()->json(array('success' => true, 'data'=>$subcategoriasCombo));
    }
}
