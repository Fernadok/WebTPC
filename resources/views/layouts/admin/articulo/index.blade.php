@include('layouts.admin.articulo.addOrUpdateModal')
@include('layouts.deleteModal')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">ARTICULOS</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <button class="btn btn-info"
                                    onclick="nuevoReg()"
                                    data-toggle='modal'
                                    data-target='#myModal'>
                                <i class="fa fa-plus"></i> <span>Crear Articulo</span>
                            </button>
                        </div>
                        <br class="hidden-lg">
                        <div class="col-lg-4 col-md-8 col-xs-12">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Ingrese criterio de busqueda...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">Buscar</button>
                                </span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <th>Reg.</th>
                            <th>Categoria</th>
                            <th>SubCategoria</th>
                            <th>Descripcion</th>
                            <th class="text-center">Accion</th>
                        </thead>
                        <tbody>
                        @foreach($articuloModel as $des)
                            <tr>
                                <td>#{{ $des->id }}</td>
                                <td>{{ $des->subcategoria->categoria->descripcion }}</td>
                                <td>{{ $des->subcategoria->descripcion }}</td>
                                <td>{{ $des->descripcion }}</td>
                                <td class="text-center" style="min-width: 198px;">
                                    <button value="{{ $des->id }}" OnClick='editar(this.value)' class='btn btn-primary' data-toggle='modal' data-target='#myModal' title="Editar"><i class="fa fa-pencil"></i> <span class="hidden-xs">Editar</span></button>
                                    <button value="{{ $des->id }}" onclick="confirmDeleteModal(this.value,'{{ route('ArticuloDestroy',['id'=> 'IDENTITY']) }}','{{ route('ArticuloIndex') }}')" class="btn btn-danger" title="Eliminar"><i class="fa fa-trash"></i> <span class="hidden-xs">Eliminar</span></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $articuloModel->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

