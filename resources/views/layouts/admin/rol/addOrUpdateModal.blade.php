@extends('layouts.formModal')
@section('modal-body')
  <div class="form-group">
      {!! Form::label('descripcion','Descripcion') !!}
      {!! Form::text('descripcion',null, ['id'=>'cat','class'=>'form-control', 'placeholder' => 'Ingresa una descripción'])!!}
  </div>
@endsection

<script type="text/javascript">

   var save = function(){
       var rol = {
           id: $("#id").val(),
           descripcion:$("#cat").val()
       };
       rol.id = rol.id || 0;

       var route = "{{ route('RolAddOrUpdate') }}";
       var token = "{{ csrf_token() }}";

       $.ajax({
           url: route,
           headers: {'X-CSRF-TOKEN': token},
           type: 'POST',
           dataType: 'json',
           data: {data: rol},
           success: function(){
               $("#myModal").modal('toggle');
               ajaxLoad('{{ route('RolIndex') }}');
           }
       });
   };

   var nuevoReg = function () {
       $('#myModalLabel').html("Nuevo Rol");
       $('.form-group input[type=text]').val('');
   };

   var editar = function(id){
        $('#myModalLabel').html('Editar #' + id);
        var route = "{{ route('RolEdit',['id'=> 'IDENTITY']) }}";
        route =route.replace('IDENTITY',id);
        $.get(route, function(res){
            $("#cat").val(res.data.descripcion);
            $("#id").val(res.data.id);
        });
   }

</script>

