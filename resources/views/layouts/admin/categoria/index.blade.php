@include('layouts.admin.categoria.addOrUpdateModal')

<div class="panel-heading">
    <h3 class="panel-title">Categorias</h3>
</div>
<a href="" class="btn btn-info" data-toggle='modal' data-target='#myModal'> Crear Categoria</a>
<table class="table table-bordered">
    <thead>
    <th>Id</th>
    <th>Descripcion</th>
    <th>Accion</th>
    </thead>
    <tbody>
    @foreach($categoryModel as $des)
        <tr>
            <td>{{ $des->id }}</td>
            <td>{{ $des->descripcion }}</td>
            <td>
                <button value="{{ $des->id }}" OnClick='editar(this.value)' class='btn btn-primary' data-toggle='modal' data-target='#myModal'>Editar</button>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $categoryModel->links() !!}

