@extends('layouts.formModal')
@section('modal-body')
  <div class="form-group">
      {!! Form::label('descripcion','Descripcion') !!}
      {!! Form::text('descripcion',null, ['id'=>'cat','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
  </div>
@endsection
@section('modal-footer')
    {!! link_to('#', $title='Guardar', $attributes = ['onClick'=>'save()', 'id'=>'save', 'class'=>'btn btn-primary'], $secure = null)!!}
@endsection

<script type="text/javascript">

   var save = function(){
       var categorias = {
           id: $("#id").val(),
           descripcion:''
       };
       categorias.id = categorias.id || 0;
       categorias.descripcion = $("#cat").val();
       var route = "{{ route('CategoriaAddOrUpdate') }}";
       var token = "{{ csrf_token() }}";

       $.ajax({
           url: route,
           headers: {'X-CSRF-TOKEN': token},
           type: 'POST',
           dataType: 'json',
           data: {data: categorias},
           success: function(){
               //Carga();
               $("#myModal").modal('toggle');
               ajaxLoad('{{ route('CategoriaIndex') }}');
           }
       });
   };

   var editar = function(id){
        var route = "{{ route('CategoriaEdit',['id'=> 'IDENTITY']) }}";
        route =route.replace('IDENTITY',id);
        $.get(route, function(res){
            $("#cat").val(res.data.descripcion);
            $("#id").val(res.data.id);
        });
   }

</script>

