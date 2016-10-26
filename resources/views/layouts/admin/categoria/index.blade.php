
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
                    <a href="{{ route('userDestroy',$des->id ) }}" class="btn btn-danger" onclick="return confirm('Desea eliminar?')">Eliminar</a>
                    <a href="{{ route('userEdit',$des->id ) }}" class="btn btn-warning" >Editar</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $categoryModel->links() !!}
